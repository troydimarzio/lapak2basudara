<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
            'nama' => 'Pisang Goreng',
            'harga' => 1000,
            'id_kategori' => 2
        ]);

        DB::table('products')->insert([
            'nama' => 'Teh Manis',
            'harga' => 5000,
            'id_kategori' => 3
        ]);
    }
}
