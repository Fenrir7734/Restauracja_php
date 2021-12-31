<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'category_id' => 1,
            'name' => 'PIZZA WEGETARIAŃSKA',
            'description' => 'Mozzarella, sos pomidorowy, świeże pomidory, papryka, czerwona cebula, pieczarki, oliwki i czosnek',
            'photo' => 'p_veggie.jpg',
            'price' => 24.90
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'name' => 'PIZZA HAWAJSKA',
            'description' => 'Mozzarella, sos pomidorowy, szynka i ananas',
            'photo' => 'p_hawaiian.jpg',
            'price' => 29.90
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'name' => 'PIZZA MARGARITA',
            'description' => 'Sos pomidorowy, mozzarella i bazylia',
            'photo' => 'p_margarita.jpg',
            'price' => 24.90
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'name' => 'PIZZA PEPPERONI',
            'description' => 'Mozzarella, sos pomidorowy i podwójne pepperoni',
            'photo' => 'p_pepperoni.jpg',
            'price' => 32.90
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'name' => 'PIZZA PRIMAVERA',
            'description' => 'Mozzarella, sos pomidorowy, szynka, świeże pomidory, czosnek i rukola',
            'photo' => 'p_primavera.jpg',
            'price' => 29.90
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'name' => 'SPAGHETTI BOLOGNESE',
            'description' => 'Mielone mięso wołowe, duszone na czerwonym winie, boczek, marchew, pietruszka, seler i zioła',
            'photo' => 'p_bolognese.jpg',
            'price' => 25.00
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'name' => 'SPAGHETTI CARBONARA',
            'description' => 'Wędzona pancetta, smietana, jajka, czarny pieprz i parmezan',
            'photo' => 'p_carbonara.jpg',
            'price' => 22.90
        ]);
        DB::table('products')->insert([
            'category_id' => 2,
            'name' => 'NORTH-WEST BURGER',
            'description' => 'Wołowina, podwójny boczek, ser edam, ogórek konserwowy, przysmażona cebula, musztarda',
            'photo' => 'b_north_west.jpg',
            'price' => 28.90
        ]);
        DB::table('products')->insert([
            'category_id' => 2,
            'name' => 'NORTH BURGER',
            'description' => 'Wołowina, boczek, ser edam, ser cheddar, świeży ogórek, majonez musztardowy',
            'photo' => 'b_north.jp',
            'price' => 31.90
        ]);
        DB::table('products')->insert([
            'category_id' => 2,
            'name' => 'NORTH-EAST BURGER',
            'description' => 'Wołowina, ser cheddar, świerze ogórki, pomidor, cebula, sałata, sos ostry',
            'photo' => 'b_north_east.jpg',
            'price' => 27.00
        ]);
        DB::table('products')->insert([
            'category_id' => 2,
            'name' => 'WEST BURGER',
            'description' => 'Wołowina, boczek, ser cheddar, jajko sadzone, czerwona cebula, majonez',
            'photo' => 'b_west.jpg',
            'price' => 29.50
        ]);
        DB::table('products')->insert([
            'category_id' => 2,
            'name' => 'POLISH BURGER',
            'description' => 'Wołowina, ser cheddar, papryka, podwójna cebula smażona, podwójna porcja ogórków konserwowych, majonez',
            'photo' => 'b_polish.jpg',
            'price' => 31.90
        ]);
        DB::table('products')->insert([
            'category_id' => 2,
            'name' => 'EAST BURGER',
            'description' => 'Wołowina, ser edam, ogórki konserwowe, czosnek, cebula smażona, majonez.',
            'photo' => 'b_east.jpg',
            'price' => 27.10
        ]);
        DB::table('products')->insert([
            'category_id' => 2,
            'name' => 'SOUTH-WEST BURGER',
            'description' => 'Wołowina, ser cheddar, świerze ogórki, bazylia, rukola, jalapeño, musztarda',
            'photo' => 'b_south_west.jpg',
            'price' => 29.90
        ]);
        DB::table('products')->insert([
            'category_id' => 2,
            'name' => 'SOUTH BURGER',
            'description' => 'Wolowina, pieczarki smażone, cebula smażona, cebula świeża, pomidory, sałata, sos BBQ, majonez musztardowy',
            'photo' => 'b_south.jp',
            'price' => 28.90
        ]);
        DB::table('products')->insert([
            'category_id' => 2,
            'name' => 'SOUTH-EAST BURGER',
            'description' => 'Wołowina, boczek, ser cheddar, pieczarki smażone, ogórki konserwowe, majonez, sos indyjski, majonez',
            'photo' => 'b_south_east.jpg',
            'price' => 31.90
        ]);
        DB::table('products')->insert([
            'category_id' => 3,
            'name' => 'FRYTKI',
            'description' => 'Proste, łódeczki lub belgijskie. Z tradycyjnych ziemniaków lub batatów. Dowolny sos do wyboru.',
            'photo' => 's_chips.jpg',
            'price' => 13.90
        ]);
        DB::table('products')->insert([
            'category_id' => 3,
            'name' => 'KRĄŻKI CEBULOWE',
            'description' => 'Panierowane i smażone w cieście piwnym krążki cebulowe.',
            'photo' => 's_onion_rings.jpg',
            'price' => 14.90
        ]);
        DB::table('products')->insert([
            'category_id' => 3,
            'name' => 'KĄSKI SEROWE',
            'description' => 'Panierowane w cieście, podawane z ketchupem i dowolnym innym sosem.',
            'photo' => 's_cheese.jpg',
            'price' => 13.90
        ]);
        DB::table('products')->insert([
            'category_id' => 3,
            'name' => 'PODPŁOMYKI PIWNE',
            'description' => 'Podawane ze specjalnym sosem. Dodatki do wyboru.',
            'photo' => 's_flatbreads.jpg',
            'price' => 12.90
        ]);
        DB::table('products')->insert([
            'category_id' => 3,
            'name' => 'SAŁATKA CAESAR',
            'description' => 'Smażona pierś kurczaka, sałata rzymska, parmezan, bagietka, sos cezar, oliwa.',
            'photo' => 's_caesar.jpg',
            'price' => 28.70
        ]);
        DB::table('products')->insert([
            'category_id' => 3,
            'name' => 'SAŁATKA Z TUŃCZYKIEM',
            'description' => 'Ryż, tuńczyk w oleju, kukurydza, jajka, przyprawy.',
            'photo' => 's_tuna.jpg',
            'price' => 25.80
        ]);
    }
}
