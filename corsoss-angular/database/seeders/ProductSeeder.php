<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Array di dati dei prodotti
        $products = [
            ['name' => 'Prodotto 1', 'price' => 10.99],
            ['name' => 'Prodotto 2', 'price' => 20.99],
            ['name' => 'Prodotto 3', 'price' => 30.99],
            ['name' => 'Prodotto 4', 'price' => 40.99],
            ['name' => 'Prodotto 5', 'price' => 50.99],
            ['name' => 'Prodotto 6', 'price' => 60.99],
            ['name' => 'Prodotto 7', 'price' => 70.99],
            ['name' => 'Prodotto 8', 'price' => 80.99],
            ['name' => 'Prodotto 9', 'price' => 90.99],
            ['name' => 'Prodotto 10', 'price' => 100.99],
            ['name' => 'Prodotto 11', 'price' => 110.99],
            ['name' => 'Prodotto 12', 'price' => 120.99],
            ['name' => 'Prodotto 13', 'price' => 130.99],
            ['name' => 'Prodotto 14', 'price' => 140.99],
            ['name' => 'Prodotto 15', 'price' => 150.99],
        ];

        // Popola la tabella con i dati dei prodotti
        foreach ($products as $productData) {
            Product::create([
                'name' => $productData['name'],
                'price' => $productData['price'],
            ]);
        }
    }
}
