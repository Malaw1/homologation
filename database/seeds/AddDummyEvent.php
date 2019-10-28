<?php

use Illuminate\Database\Seeder;

use App\Event;

class AddDummyEvent extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {

        $data = [

        	['title'=>'Depot Echantillon ', 'date'=>'2019-10-10', 'user_id'=>'5', 'demande_id' => 19],

            ['title'=>'Depot Echantillon ', 'date'=>'2019-11-10', 'user_id'=>'4', 'demande_id' => 9],

            ['title'=>'Depot Echantillon ', 'date'=>'2019-12-10', 'user_id'=>'16', 'demande_id' => 13],

        ];

        foreach ($data as $key => $value) {

        	Event::create($value);

        }

    }

}
