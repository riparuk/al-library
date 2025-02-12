<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) { // Ubah angka 10 sesuai jumlah data yang diinginkan
            Book::create([
                'title' => $faker->sentence(3), // Judul dengan 3 kata
                'author' => $faker->name(),
                'publisher' => $faker->company(),
                'year' => $faker->year(),
                'description' => $faker->paragraph(),
                'cover_image' => 'https://picsum.photos/seed/200/300', // Gambar dari Picsum
            ]);
        }
    }
}
