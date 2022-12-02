<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\vendor;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        vendor::create([
            'kode_vendor' => 'V001',
            'nama_vendor' =>'PT.A',
            'jenis_vendor' => 'Individual',
            'email_vendor' => 'Perusahaankain@gmail.com',
            'telpon_vendor' => '081293104814',
            'bahan_baku' => 'Kain',
            'harga' => 2500,
            'rekening_vendor' => '00192812024',
            'request_order' => 0,
            'foto' => 0
        ]);
        vendor::create([
            'kode_vendor' => 'V002',
            'nama_vendor' =>'PT.B',
            'jenis_vendor' => 'Individual',
            'email_vendor' => 'Persuhaan.benang@gmail.com',
            'telpon_vendor' => '081293104814',
            'bahan_baku' => 'Benang',
            'harga' => 4500,
            'rekening_vendor' => '01192812024',
            'request_order' => 0,
            'foto' => 0
        ]);
        vendor::create([
            'kode_vendor' => 'V003',
            'nama_vendor' =>'PT.C',
            'jenis_vendor' => 'Individual',
            'email_vendor' => 'Perusahaandakron@gmail.com',
            'telpon_vendor' => '081293104814',
            'bahan_baku' => 'Dakron',
            'harga' => 7500,
            'rekening_vendor' => '02192812024',
            'request_order' => 0,
            'foto' => 0
        ]);
    }
}
