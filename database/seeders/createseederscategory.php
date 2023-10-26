<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class createseederscategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            Category::create([
                'category' => 'Minuman',
            ]);
            Category::create([
                'category' => 'Snack',
            ]);
            Category::create([
                'category' => 'Roti',
            ]);
            Category::create([
                'category' => 'Obat-Obatan',
            ]);
            Category::create([
                'category' => 'Deterjen',
            ]);
            Category::create([
                'category' => 'Sabun',
            ]);
            Category::create([
                'category' => 'Bahan Pokok',
            ]);
        });
    }
}
