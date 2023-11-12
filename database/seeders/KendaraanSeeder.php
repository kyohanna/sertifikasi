<?php

// namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = [
            'Mobil',
            'Motor',
            'Truk',
        ];

        // Loop through the options and create records
        foreach ($options as $option) {
            DB::table('kendaraan')->insert([
                'jenis' => $option,
                'created_at' => new \DateTime,
            ]);
        }
    }
}
