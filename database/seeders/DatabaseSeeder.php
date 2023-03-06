<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_detail')->insert([
            'document_code' => 'TRX',
            'document_number' => '001',
            'product_code' => 'SKURNSOP',
            'price'         => '25000',
            'quantity'      => 2,
            'unit'          => 'PCS',
            'sub_total'      => '67000',
            'currency'     => 'IDR',
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
