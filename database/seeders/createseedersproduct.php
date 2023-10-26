<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class createseedersproduct extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            Product::create([
                'product_name' => 'Chitato',
                'category_id' => 2,
                'price' => 8000,
                'description' => 'Snack Ringan Berbahankan Kentang',
            ]);
            Product::create([
                'product_name' => 'Teh Pucuk 500ml',
                'category_id' => 1,
                'price' => 6000,
                'description' => 'Minuman Berbahan Dasar Teh & Gula',
            ]);
            Product::create([
                'product_name' => 'Sari Roti Sandwich Coklat',
                'category_id' => 3,
                'price' => 5000,
                'description' => 'Makanan Berbentuk Sandwich Berbahan Dasar Tepung & Coklat',
            ]);
            Product::create([
                'product_name' => 'Doritos',
                'category_id' => 2,
                'price' => 12000,
                'description' => 'Snack Ringan Berbahankan Jagung',
            ]);
            Product::create([
                'product_name' => 'Hidro Coco 300ml',
                'category_id' => 1,
                'price' => 9000,
                'description' => 'Minuman Berbahan Dasar Air Kepala Asli',
            ]);
            Product::create([
                'product_name' => 'Sari Roti Sandwich Keju',
                'category_id' => 3,
                'price' => 5000,
                'description' => 'Makanan Berbentuk Sandwich Berbahan Dasar Tepung & Keju',
            ]);
            Product::create([
                'product_name' => 'Piattos',
                'category_id' => 2,
                'price' => 9000,
                'description' => 'Snack Ringan Berbahankan Kentang',
            ]);
            Product::create([
                'product_name' => 'C1000 250ml',
                'category_id' => 1,
                'price' => 8000,
                'description' => 'Minuman Berbahan Dasar Sari Jeruk',
            ]);
            Product::create([
                'product_name' => 'Sari Roti Sandwich Stowberry',
                'category_id' => 3,
                'price' => 5000,
                'description' => 'Makanan Berbentuk Sandwich Berbahan Dasar Tepung & Stowberry',
            ]);
        });
    }
}
