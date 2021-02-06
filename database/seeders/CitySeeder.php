<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$currentDateTime = Carbon::now();
        $cities = array(
			array('name' => "Aldona", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Altinho", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Aquem", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Arpora", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Bambolim", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Bandora", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Bardez", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Benaulim", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Betora", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Bicholim", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Calapor", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Candolim", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Caranzalem", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Carapur", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Chicalim", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Chimbel", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Chinchinim", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Colvale", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Corlim", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Cortalim", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Cuncolim", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Curchorem", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Curti", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Davorlim", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Dona Paula", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Goa", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Guirim", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Jua", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Kalangat", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Kankon", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Kundaim", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Loutulim", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Madgaon", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Mapusa", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Margao", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Margaon", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Miramar", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Morjim", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Mormugao", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Navelim", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Pale", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Panaji", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Parcem", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Parra", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Penha de Franca", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Pernem", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Pilerne", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Pissurlem", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Ponda", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Porvorim", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Quepem", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Queula", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Raia", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Reis Magos", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Salcette", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Saligao", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Sancoale", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Sanguem", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Sanquelim", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Sanvordem", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Sao Jose-de-Areal", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Sattari", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Serula", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Sinquerim", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Siolim", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Taleigao", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Tivim", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Valpoi", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Varca", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Vasco", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
			array('name' => "Verna", 'created_at' => $currentDateTime, 'updated_at' => $currentDateTime),
		);

        DB::table('cities')->insert($cities);

    }
}
