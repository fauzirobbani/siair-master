<?php

use Illuminate\Database\Seeder;

class PelangganSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pelanggan')->insert([
        	'rekening' => 120100,
        	'nama' => 'Anwar Baharudin',
            'alamat' => 'Tompak RT 01',
            'hp' => 6285239770202
        ]);
    }
}
