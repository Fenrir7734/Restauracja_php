<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\CartContent;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('order');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($filter, $sort)
    {
        $filterStatement = ['status', '!=', $filter];
        if ($filter === '1' || $filter == '2' || $filter == '3' || $filter == '4') {
            $filterStatement = ['status', '=', $filter];
        }

        $sortRow = 'ordered_at';
        $sortDirection = 'desc';
        if ($sort === '1') {
            $sortRow = 'ordered_at';
            $sortDirection = 'asc';
        } else if ($sort === '2') {
            $sortRow = 'amount';
            $sortDirection = 'desc';
        } else if ($sort === '3') {
            $sortRow = 'amount';
            $sortDirection = 'asc';
        }

        $cart = Cart::where([
            ['user_id', '=' ,\Auth::user()->id],
            $filterStatement
        ])
            ->orderBy($sortRow, $sortDirection)
            ->paginate(10);
        return view('order_history', ['orders' => $cart]);
    }

    public function filter(Request $request) {

    }

    public function sort(Request $request) {

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        $address = $this->buildAddress($request);
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

        return redirect()->route('order-complete');
    }

    private function buildAddress(Request $request) {
        $phone = str_replace("-", "",$request->get('phone'));
        if (str_starts_with($phone, "+")) {
            $phone = substr($phone, 3);
        }

        $address = new Address();
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
