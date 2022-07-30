<?php

use App\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            'nama' => 'Buah',
        ]);
        Kategori::create([
            'nama' => 'Sayur',
        ]);
        Kategori::create([
            'nama' => 'Daging',
        ]);
        Kategori::create([
            'nama' => 'Rempah rempah',
        ]);
    }
}
