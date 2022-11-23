<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        bom::create([
            'kode' => 'B001',
            'nama' => 'Bantal',
            'size' => 'S',
            'kain' => 1,
            'benang' => 1,
            'dakron' => 250,
            'quantity' => 1,
            'estimasi' => 25
        ]);
        bom::create([
            'kode' => 'B002',
            'nama' => 'Bantal',
            'size' => 'M',
            'kain' => 2,
            'benang' => 1.5,
            'dakron' => 500,
            'quantity' => 1,
            'estimasi' => 35
        ]);
        bom::create([
            'kode' => 'B003',
            'nama' => 'Bantal',
            'size' => 'L',
            'kain' => 3,
            'benang' => 2,
            'dakron' => 750,
            'quantity' => 1,
            'estimasi' => 50
        ]);
    }
}
