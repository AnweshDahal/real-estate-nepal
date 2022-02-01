<?php

namespace Database\Seeders;

use App\Models\Locality;
use Illuminate\Database\Seeder;

class LocalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $localities = [
            [
                'id' => 1,
                'locality_name' => 'Gyaneshowr',
                'latitude' => '27.71045044376555',
                'longitude' => '85.33275837019202'
            ],
            [
                'id' => 2,
                'locality_name' => 'Old Baneshowr',
                'latitude' => '27.70310205103249',
                'longitude' => '85.3426102199068'
            ],
            [
                'id' => 3,
                'locality_name' => 'Thapagaon',
                'latitude' => '27.698564970114546',
                'longitude' => '85.37234620232519'
            ],
            [
                'id' => 4,
                'locality_name' => 'Sanothimi',
                'latitude' => '27.685196013916446',
                'longitude' => '85.37406751632986'
            ],
            [
                'id' => 5,
                'locality_name' => 'Lokanthali',
                'latitude' => '27.674139259931735',
                'longitude' => '85.35929692314244'
            ],
        ];

        Locality::insert($localities);
    }
}
