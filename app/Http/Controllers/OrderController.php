<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\CartContent;
use App\Models\Product;
use App\Models\User;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

    public function index()
    {
        return view('order');
    }

    public function index_preview() {
        $cart = DB::table('cart')
            ->join('address', 'address.id', '=', 'cart.address_id')
            ->select('cart.id', 'address.first_name', 'address.last_name', 'cart.status', 'cart.ordered_at', 'cart.amount')
            ->orderBy('cart.ordered_at', 'desc')
            ->paginate(10);
        return view('/admin/order_preview', ['orders' => $cart]);
    }

    public function create() {
        $p_filters = ['0', '1', '2', '3', '4', '5', '6'];
        $p_sort = ['ordered_at', 'amount'];
        $p_direction = ['asc', 'desc'];

        if (!in_array(\request()->get('filter'), $p_filters) ||
            !in_array(\request()->get('sort'), $p_sort) ||
            !in_array(\request()->get('direction'), $p_direction)) {
            return redirect()->route('history-order', ['filter' => '0', 'sort' => 'ordered_at', 'direction' => 'asc']);
        }

        $filter = \request()->get('filter') != '0' ? ['status', '=', \request()->get('filter')] : ['status', '!=', '0'];
        $sort = \request()->get('sort');
        $direction = \request()->get('direction');

        $cart = Cart::where([
            ['user_id', '=' ,\Auth::user()->id],
            $filter
        ])
            ->orderBy($sort, $direction)
            ->paginate(10);
        return view('order_history', ['orders' => $cart]);
    }

    public function content($id) {
        $cart = Cart::find($id);
        $adress = Address::find($cart->address_id);
        $products = DB::table('cart_content')
            ->select(
                'products.name',
                'products.price',
                'cart_content.quantity',
                'cart_content.cart_id'
            )
            ->join('products', 'cart_content.product_id', '=', 'products.id')
            ->where('cart_id', $id)
            ->get();
        return view(
            'order_details',
            [
                'cart' => $cart,
                'products' => $products,
                'address' => $adress
            ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first-name' => [
                'required',
                'min:3',
                'max:40',
                'regex:/^[A-ZĘĄŚŁŻŹĆŃÓ][ a-zA-ZęąśłżźćńóĘĄŚŁŻŹĆŃÓ]{1,20}$/'
            ],
            'last-name' =>  [
                'required',
                'min:3',
                'max:40',
                'regex:/^[A-ZĘĄŚŁŻŹĆŃÓ][ a-zA-ZęąśłżźćńóĘĄŚŁŻŹĆŃÓ-]{1,40}$/'
            ],
            'street' => [
                'required',
                'min:3',
                'max:40',
                'regex:/^[0-9A-ZĘĄŚŁŻŹĆŃÓ][ 0-9a-zA-ZęąśłżźćńóĘĄŚŁŻŹĆŃÓ-]{1,40}$/'
            ],
            'house' => [
                'required',
                'min:3',
                'max:4',
                'regex:/^\d{1,5}\w{0,4}$/'
            ],
            'flat' => [
                'nullable',
                'integer',
                'min: 1',
                'max:9999',
                'regex:/^[0-9]{0,3}$/'
            ],
            'postcode' => [
                'required',
                'min:5',
                'max:6',
                'regex:/^([0-9]{2}-[0-9]{3})|[0-9]{5}$/'
            ],
            'mail' => [
                'required',
                'max:255',
                'email'
            ],
            'phone' => [
                'required',
                'min:9',
                'regex:/^(\+[0-9]{2})?[0-9]{3}[-]?[0-9]{3}[-]?[0-9]{3}$/'
            ],
            'city' => [
                'required',
                'min:3',
                'max:40',
                'regex:/^[0-9A-ZĘĄŚŁŻŹĆŃÓ][ 0-9a-zA-ZęąśłżźćńóĘĄŚŁŻŹĆŃÓ-]{1,40}$/'
            ]
        ]);

        if ($validator->fails()) {
            return \redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (\Auth::user() == null) {
            return redirect('login');
        }

        $address = $this->buildAddressFromRequest($request);
        if (!$address->save()) {
            return \redirect('error');
        }

        $cart = $this->buildCart($request);
        if (!$address->cart()->save($cart)) {
            return \redirect('error');
        }

        $cartFromSession = session()->get('cart', []);
        foreach ($cartFromSession as $id => $content) {
            if (!$cart->content()->save($this->buildCartContent($id, $content))) {
                return \redirect('error');
            }
        }
        session()->remove('cart');
        return redirect()->route('order-complete');
    }

    private function buildAddress(Request $request, Address $address) {
        $phone = str_replace("-", "",$request->get('phone'));
        if (str_starts_with($phone, "+")) {
            $phone = substr($phone, 3);
        }

        //$address = new Address();
        $address->user_id = \Auth::user()->id;
        $address->first_name = $request->get('first-name');
        $address->last_name = $request->get('last-name');
        $address->street = $request->get('street');
        $address->house = $request->get('house');
        $address->flat = $request->get('flat', null);
        $address->post_code = str_replace("-", "",$request->get('postcode'));
        $address->phone = $phone;
        $address->city = $request->get('city');

        return $address;
    }

    private function buildAddressFromRequest(Request $request) {
        return $this->buildAddress($request, new Address());
    }

    private function buildCart(Request $request) {
        $cartFromSession = session()->get('cart', []);

        $amount = 0;
        foreach ($cartFromSession as $id => $content) {
            $amount += $content[$id]['total_price'];
        }

        $tz = 'Europe/Warsaw';
        $timestamp = time();
        $dt = new DateTime("now", new DateTimeZone($tz));
        $dt->setTimestamp($timestamp);

        $cart = new Cart();
        $cart->user_id = \Auth::user()->id;
        $cart->description = $request->note;
        $cart->status = 1;
        $cart->amount = $amount;
        $cart->ordered_at = $dt->format("Y-m-d H:m:s");
        return $cart;
    }

    private function buildCartContent($productId, $content) {
        $c = new CartContent();
        $c->product_id = $productId;
        $c->quantity = $content[$productId]['quantity'];
        $c->amount = $content[$productId]['total_price'];
        return $c;
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $cart = DB::table('cart')
            ->join('address', 'address.id', '=', 'cart.address_id')
            ->join('users', 'users.id', '=', 'cart.user_id')
            ->where('cart.id', $id)
            ->select(
                'cart.id', 'cart.user_id', 'cart.address_id' ,'cart.description', 'cart.status', 'cart.amount',
                'cart.ordered_at', 'cart.delivered_at', 'address.first_name', 'address.last_name', 'address.street',
                'address.house', 'address.flat', 'address.post_code', 'address.city', 'address.phone', 'users.email'
            )
            ->get();
        $content = DB::table("cart_content")
            ->join('products', 'products.id', '=', 'cart_content.product_id')
            ->where('cart_id', $id)
            ->select(
                'cart_content.id', 'cart_content.cart_id', 'cart_content.quantity' , 'cart_content.amount',
                'products.name', 'products.price'
            )
            ->get();
        return view('/admin/order_edit', ['cart' => $cart[0], 'contents' => $content]);
    }

    public function update(Request $request, $id)
    {
        $validator1 = $this->makeValidator($request);
        $validator2 = Validator::make($request->all(),[
            'order-date' => [
                'required',
                'date',
                'date_format:Y-m-d\TH:i:s'
            ],
            'delivery-date' => [
                'nullable',
                'date',
                'after:order-date',
                'date_format:Y-m-d\TH:i:s'
            ]
        ]);
        $validator1->validate();
        $validator2->validate();

        $cart = Cart::find($id);
        $address = Address::find($cart->address_id);
        $address = $this->buildAddress($request, $address);
        $cart->delivered_at = $request->status != 4 && $request->status != 5 ? null : $request->get('delivery-date');
        $cart->status = $request->status;
        $cart->description = $request->note;
        if ($address->save() && $cart->save()) {
            return redirect()->back();
        }
        return redirect('error');
    }

    public function updateContent(Request $request) {
        $validator = Validator::make($request->all(), [
            'quantity' => [
                'required',
                'digits_between:1,99'
            ]
        ]);

        if ($validator->fails()) {
            session()->put(['err' => "Liczba musi być pomiędzy 1 a 99"]);
            return;
        }

        $content = CartContent::find($request->id);
        $content->quantity = $request->quantity;
        $product = Product::find($content->product_id);
        $content->amount = $content->quantity * $product->price;
        if ($content->save()) {
            $cart = Cart::find($request->cart_id);
            $all_content = DB::table('cart_content')
                ->where('cart_id', $request->cart_id)
                ->get();
            $sum = 0;
            foreach ($all_content as $c) {
                $sum += $c->amount;
            }
            $cart->amount = $sum;
            $cart->save();
        }
    }

    public function destroy($id)
    {
        $order = Cart::find($id);

        if ($order->delete()) {
            return redirect()->route('order-preview');
        }
        return redirect('error');
    }

    public function removeFromOrder($content_id, $cart_id) {
        $content = CartContent::find($content_id);
        if ($content->delete()) {
            $cart = Cart::find($cart_id);
            $cart->amount = $cart->amount - $content->amount;
            if ($cart->save()) {
                return redirect()->back();
            }
        }
        return redirect('error');
    }

    private function makeValidator(Request $request) {
        return Validator::make($request->all(), [
            'first-name' => [
                'required',
                'min:3',
                'max:40',
                'regex:/^[A-ZĘĄŚŁŻŹĆŃÓ][ a-zA-ZęąśłżźćńóĘĄŚŁŻŹĆŃÓ]{1,20}$/'
            ],
            'last-name' =>  [
                'required',
                'min:3',
                'max:40',
                'regex:/^[A-ZĘĄŚŁŻŹĆŃÓ][ a-zA-ZęąśłżźćńóĘĄŚŁŻŹĆŃÓ-]{1,40}$/'
            ],
            'street' => [
                'required',
                'min:3',
                'max:40',
                'regex:/^[0-9A-ZĘĄŚŁŻŹĆŃÓ][ 0-9a-zA-ZęąśłżźćńóĘĄŚŁŻŹĆŃÓ-]{1,40}$/'
            ],
            'house' => [
                'required',
                'min:3',
                'max:4',
                'regex:/^\d{1,5}\w{0,4}$/'
            ],
            'flat' => [
                'nullable',
                'integer',
                'min: 1',
                'max:9999',
                'regex:/^[0-9]{0,3}$/'
            ],
            'postcode' => [
                'required',
                'min:5',
                'max:6',
                'regex:/^([0-9]{2}-[0-9]{3})|[0-9]{5}$/'
            ],
            'mail' => [
                'required',
                'max:255',
                'email'
            ],
            'phone' => [
                'required',
                'min:9',
                'regex:/^(\+[0-9]{2})?[0-9]{3}[-]?[0-9]{3}[-]?[0-9]{3}$/'
            ],
            'city' => [
                'required',
                'min:3',
                'max:40',
                'regex:/^[0-9A-ZĘĄŚŁŻŹĆŃÓ][ 0-9a-zA-ZęąśłżźćńóĘĄŚŁŻŹĆŃÓ-]{1,40}$/'
            ]
        ]);
    }
}
