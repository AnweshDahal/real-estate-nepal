<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Locality;

class LocalitySeederAdditions extends Seeder
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
                'id' => 6,
                'locality_name' => 'Tengal',
                'latitude' => '27.71023679894223',
                'longitude' => '85.30579194672158'
            ],
            [
                'id' => 7,
                'locality_name' => 'Naghal',
                'latitude' => '27.710198805528908',
                'longitude' => '85.30918225857671'
            ],
            [
                'id' => 8,
                'locality_name' => 'Jyatha',
                'latitude' =>  '27.711832510352643',
                'longitude' => '85.3121863323724'
            ], 
            [
                'id' => 9,
                'locality_name' => 'Jamal',
                'latitude' => '27.709514921826212',
                'longitude' => '85.31514749082815',
            ],
            [
                'id' => 10,
                'locality_name' => 'Kamaladi',
                'latitude' => '27.709400940792275',
                'longitude' => '85.31956777084181',
            ],
            [
                'id' => 11,
                'locality_name' => 'Kalikasthan',
                'latitude' => '27.704005702295955',
                'longitude' => '85.32536134173348',
            ],
            [
                'id' => 12,
                'locality_name' => 'Bhadrakali',
                'latitude' => '27.697128286193333',
                'longitude' => '85.31716451180526',
            ],
            [
                'id' => 13,
                'locality_name' => 'Tripureshowr',
                'latitude' => '27.695266369718787',
                'longitude' => '85.31523332150803',
            ],
            [
                'id' => 14,
                'locality_name' => 'Kupondole',
                'latitude' => '27.686696674237105',
                'longitude' => '85.31463365006898',
            ],
            [
                'id' => 15,
                'locality_name' => 'Thapathali',
                'latitude' => '27.689679290708103',
                'longitude' => '85.32300342739498',
            ],
            [
                'id' => 16,
                'locality_name' => 'Buddhanagar',
                'latitude' => '27.68687741191',
                'longitude' => '85.32994421834823',
            ],
            [
                'id' => 17,
                'locality_name' => 'Gairigaon',
                'latitude' => '27.688142801488954',
                'longitude' => '85.34882725255929',
            ],
            [
                'id' => 18,
                'locality_name' => 'New Baneshowr',
                'latitude' => '27.691803225494645',
                'longitude' => '85.34173335592325',
            ],
            [
                'id' => 19,
                'locality_name' => 'Koteshowr',
                'latitude' => '27.675985697874747',
                'longitude' => '85.34622445727618',
            ],
            [
                'id' => 20,
                'locality_name' => 'Balkumari',
                'latitude' => '27.669929238134397',
                'longitude' => '85.340610582240406',
            ],
            [
                'id' => 21,
                'locality_name' => 'Gwarko',
                'latitude' => '27.666629682011138',
                'longitude' => '85.33270012133903',
            ],
            [
                'id' => 22,
                'locality_name' => 'Kusunti',
                'latitude' => '27.6556907155722',
                'longitude' => '85.31631781290697',
            ],
            [
                'id' => 23,
                'locality_name' => 'Ekantakuna',
                'latitude' => '27.66757887941739',
                'longitude' => '85.31044876165144',
            ],
            [
                'id' => 24,
                'locality_name' => 'Kalanki',
                'latitude' => '27.693655985802092',
                'longitude' => '85.28028693890967',
            ],
            [
                'id' => 25,
                'locality_name' => 'Jadibutti',
                'latitude' => '27.675220340943337',
                'longitude' => '85.35349376695548',
            ],
            [
                'id' => 26,
                'locality_name' => 'Lokanthali',
                'latitude' => '27.673728845448956',
                'longitude' => '85.35910764199119',
            ],
            [
                'id' => 27,
                'locality_name' => 'Narephate',
                'latitude' => '27.672282527342304',
                'longitude' => '85.34987026579606',
            ],
            [
                'id' => 28,
                'locality_name' => 'Kaushaltar',
                'latitude' => '27.675627108907886',
                'longitude' => '85.36518083407529',
            ],
            [
                'id' => 29,
                'locality_name' => 'Sagbari',
                'latitude' => '27.673819239694918',
                'longitude' => '85.36768156022757 ',
            ],
            [
                'id' => 30,
                'locality_name' => 'Gatthaghar',
                'latitude' => '27.676892599590417',
                'longitude' => '85.37293818970305',
            ],
            [
                'id' => 31,
                'locality_name' => 'Madhyapur Thimi',
                'latitude' => '27.678474442278116',
                'longitude' => '85.38038933367886',
            ],
            [
                'id' => 32,
                'locality_name' => 'Sallaghari',
                'latitude' => '27.671785350954636',
                'longitude' => '85.40751455954009',
            ],
            [
                'id' => 33,
                'locality_name' => 'Katunje',
                'latitude' => '27.66437263645023',
                'longitude' => '85.40930079250602',
            ],
            [
                'id' => 34,
                'locality_name' => 'Balkot',
                'latitude' => '27.663739820252644',
                'longitude' => '85.37776102223424',
            ],
            [
                'id' => 35,
                'locality_name' => 'Bhaktapur',
                'latitude' => '27.671016983049867',
                'longitude' => '85.42951074577422 ',
            ],
        ];

        Locality::insert($localities);
    }
}
