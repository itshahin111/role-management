<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("products")->insert(
            [
                [
                    'name' => 'Product 1',
                    'description' => 'Description for Product 1',
                    'price' => 10.00,
                    'image' => 'https://example.com/product1.jpg',
                    'quantity' => 100,
                ],
                [
                    'name' => 'Product 2',
                    'description' => 'Description for Product 2',
                    'price' => 20.00,
                    'image' => 'https://example.com/product2.jpg',
                    'quantity' => 200,
                ],
                [
                    'name' => 'Product 3',
                    'description' => 'Description for Product 3',
                    'price' => 30.00,
                    'image' => 'https://example.com/product3.jpg',
                    'quantity' => 300,
                ],
                [
                    'name' => 'Product 4',
                    'description' => 'Description for Product 4',
                    'price' => 40.00,
                    'image' => 'https://example.com/product4.jpg',
                    'quantity' => 400,
                ],
                [
                    'name' => 'Product 5',
                    'description' => 'Description for Product 5',
                    'price' => 50.00,
                    'image' => 'https://example.com/product5.jpg',
                    'quantity' => 500,
                ],
                [
                    'name' => 'Product 6',
                    'description' => 'Description for Product 6',
                    'price' => 60.00,
                    'image' => 'https://example.com/product6.jpg',
                    'quantity' => 600,
                ],
                [
                    'name' => 'Product 7',
                    'description' => 'Description for Product 7',
                    'price' => 70.00,
                    'image' => 'https://example.com/product7.jpg',
                    'quantity' => 700,
                ],
                [
                    'name' => 'Product 8',
                    'description' => 'Description for Product 8',
                    'price' => 80.00,
                    'image' => 'https://example.com/product8.jpg',
                    'quantity' => 800,
                ],
                [
                    'name' => 'Product 9',
                    'description' => 'Description for Product 9',
                    'price' => 90.00,
                    'image' => 'https://example.com/product9.jpg',
                    'quantity' => 900,
                ],
                [
                    'name' => 'Product 10',
                    'description' => 'Description for Product 10',
                    'price' => 100.00,
                    'image' => 'https://example.com/product10.jpg',
                    'quantity' => 1000,
                ],
                [
                    'name' => 'Product 11',
                    'description' => 'Description for Product 11',
                    'price' => 110.00,
                    'image' => 'https://example.com/product11.jpg',
                    'quantity' => 1100,
                ],
                [
                    'name' => 'Product 12',
                    'description' => 'Description for Product 12',
                    'price' => 120.00,
                    'image' => 'https://example.com/product12.jpg',
                    'quantity' => 1200,
                ],
                [
                    'name' => 'Product 13',
                    'description' => 'Description for Product 13',
                    'price' => 130.00,
                    'image' => 'https://example.com/product13.jpg',
                    'quantity' => 1300,
                ],
                [
                    'name' => 'Product 14',
                    'description' => 'Description for Product 14',
                    'price' => 140.00,
                    'image' => 'https://example.com/product14.jpg',
                    'quantity' => 1400,
                ],
                [
                    'name' => 'Product 15',
                    'description' => 'Description for Product 15',
                    'price' => 150.00,
                    'image' => 'https://example.com/product15.jpg',
                    'quantity' => 1500,
                ],
                [
                    'name' => 'Product 16',
                    'description' => 'Description for Product 16',
                    'price' => 160.00,
                    'image' => 'https://example.com/product16.jpg',
                    'quantity' => 1600,
                ],
                [
                    'name' => 'Product 17',
                    'description' => 'Description for Product 17',
                    'price' => 170.00,
                    'image' => 'https://example.com/product17.jpg',
                    'quantity' => 1700,
                ],
                [
                    'name' => 'Product 18',
                    'description' => 'Description for Product 18',
                    'price' => 180.00,
                    'image' => 'https://example.com/product18.jpg',
                    'quantity' => 1800,
                ],
                [
                    'name' => 'Product 19',
                    'description' => 'Description for Product 19',
                    'price' => 190.00,
                    'image' => 'https://example.com/product19.jpg',
                    'quantity' => 1900,
                ],
                [
                    'name' => 'Product 20',
                    'description' => 'Description for Product 20',
                    'price' => 200.00,
                    'image' => 'https://example.com/product20.jpg',
                    'quantity' => 2000,
                ],
            ]
        );
    }
}
