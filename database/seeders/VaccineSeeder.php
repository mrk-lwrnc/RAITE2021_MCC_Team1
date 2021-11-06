<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vaccine;

class VaccineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $vaccines = [
            [
                'vaccine_name' => 'Pfizer-BioNTech',
                'vaccine_manufacturer' => 'Pfizer, Inc. and BioTech',
                'vaccine_info' => '2 shots',
                'vaccine_restriction' => 'Only for people 12 yrs old and older',
            ],
            [
                'vaccine_name' => 'Moderna',
                'vaccine_manufacturer' => 'ModernaTX Inc.',
                'vaccine_info' => '2 shots',
                'vaccine_restriction' => 'Only for people 18 yrs old and older',
            ],
            [
                'vaccine_name' => 'Johnson & Johnson\'s Janssen',
                'vaccine_manufacturer' => 'Janssen Pharmaceuticals Companies of Johnson & Johnson',
                'vaccine_info' => '2 shots',
                'vaccine_restriction' => 'Only for people 18 yrs old and older',
            ],
        ];

        Vaccine::insert($vaccines);
    }
}
