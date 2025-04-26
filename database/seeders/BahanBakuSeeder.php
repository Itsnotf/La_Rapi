<?php

namespace Database\Seeders;

use App\Models\BahanBaku;
use App\Models\Harga;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BahanBakuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pasars = [
            'pasar betung',
            'pasar sukomoro',
            'pasar sukajadi',
            'pasar kenten laut',
            'pasar pangkalan balai',
        ];

        $beras = BahanBaku::create([
            'nama' => 'Beras',
            'satuan' => 'kg'
        ]);

        $gula = BahanBaku::create([
            'nama' => 'Gula',
            'satuan' => 'kg'
        ]);

        $startDate = Carbon::now()->subMonths(3);
        $endDate = Carbon::now();

        for ($date = $startDate->copy(); $date <= $endDate; $date->addDay()) {
            $randomPasar = $pasars[array_rand($pasars)];

            Harga::create([
                'bahan_baku_id' => $beras->id,
                'tanggal' => $date->format('Y-m-d'),
                'harga' => rand(10000, 15000),
                'pasar' => $randomPasar,
                'created_by' => 1,
            ]);

            $randomPasar = $pasars[array_rand($pasars)];

            Harga::create([
                'bahan_baku_id' => $gula->id,
                'tanggal' => $date->format('Y-m-d'),
                'harga' => rand(12000, 16000),
                'pasar' => $randomPasar,
                'created_by' => 1,
            ]);
        }
    }
}
