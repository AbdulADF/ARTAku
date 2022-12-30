<?php

namespace Database\Seeders;

use App\Models\income;
use App\Models\expense;

use App\Models\category;
use Illuminate\Support\Str;
use App\Models\budgeting_plan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        budgeting_plan::create([
            'name' => 'Strict',
            'saved_percentage' => 20,
        ]);

        budgeting_plan::create([
            'name' => 'Moderate',
            'saved_percentage' => 10,
        ]);

        budgeting_plan::create([
            'name' => 'Lavish',
            'saved_percentage' => 5,
        ]);

        category::create([
            'name' => 'Belanja',
        ]);

        category::create([
            'name' => 'Teknologi',
        ]);
        
        category::create([
            'name' => 'Asuransi',
        ]);

        category::create([
            'name' => 'Makanan & Minuman',
        ]);

        category::create([
            'name' => 'Bensin',
        ]);

        category::create([
            'name' => 'Donasi',
        ]);

        category::create([
            'name' => 'Hiburan',
        ]);

        category::create([
            'name' => 'Kesehatan',
        ]);

        category::create([
            'name' => 'Tagihan',
        ]);

        category::create([
            'name' => 'Transportasi',
        ]);

        category::create([
            'name' => 'Pendidikan',
        ]);

        category::create([
            'name' => 'Pajak',
        ]);

        category::create([
            'name' => 'Lainnya',
        ]);

        expense::create([
            'description' => 'exp 1',
            'amount' => 100000,
            'date' => '2022-12-21',
            'category_id' => 1,
            'User_id' => 1,
        ]);

        expense::create([
            'description' => 'exp 2',
            'amount' => 200000,
            'date' => '2022-12-21',
            'category_id' => 2,
            'User_id' => 1,
        ]);

        expense::create([
            'description' => 'exp 3',
            'amount' => 300000,
            'date' => '2022-12-21',
            'category_id' => 3,
            'User_id' => 1,
        ]);

        expense::create([
            'description' => 'exp 4',
            'amount' => 400000,
            'date' => '2022-12-21',
            'category_id' => 4,
            'User_id' => 1,
        ]);

        expense::create([
            'description' => 'exp 5',
            'amount' => 500000,
            'date' => '2022-12-21',
            'category_id' => 5,
            'User_id' => 1,
        ]);

        income::create([
            'description' => 'inc 1',
            'amount' => 5000000,
            'date' => '2022-12-21',
            'User_id' => 1,
        ]);
    }
}
