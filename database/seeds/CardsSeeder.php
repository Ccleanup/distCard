<?php

use Illuminate\Database\Seeder;
use App\Card;

class CardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        DB::table('cards')->truncate();

        $S = ['S', 'H', 'D', 'C'];
        $N = ['A', '2', '3', '4', '5', '6', '7', '8', '9', 'X', 'J', 'Q', 'K'];

        foreach ($S as $s) {
            foreach ($N as $n) {
                // $cards = [
                //     ['spade' => $s, 'number' => $n]
                // ];
                Card::create(['spade' => $s, 'number' => $n]);
            }
        }

    }
}
