<?php

use Illuminate\Database\Seeder;

use App\Surah;

class SurahsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Surah::truncate();
        Surah::create([
        	'nama_surat' => 'Nama_surat',
			
        ]);
    }
}
