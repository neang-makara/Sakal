<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use App\Models\School;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $types = [
        //     'សាកលវិទ្យាល័យ',
        //     'វិទ្យាស្ថាន'
        // ];

        // foreach ($types as $type) {
        //     $t = new Type();
        //     $t->name = $type;
        //     $t->save();
        // }

        // $schools = [
        //     [
        //         'name' => 'សាកលវិទ្យាល័យន័រតុន',
        //         'logo' => '#',
        //         'note' => 'some text',
        //         'type_id' => 1,
        //         'latitude' => 0.0,
        //         'longitude' => 0.0
        //     ],
        //     [
        //         'name' => 'សាកលវិទ្យាល័យភូមិន្ទភ្នំពេញ',
        //         'logo' => '#',
        //         'note' => 'some text',
        //         'type_id' => 1,
        //         'latitude' => 0.0,
        //         'longitude' => 0.0
        //     ]
        // ];

        // foreach ($schools as $school) {
        //     $s = new School();
        //     $s->name = $school['name'];
        //     $s->logo = $school['logo'];
        //     $s->note = $school['note'];
        //     $s->type_id = $school['type_id'];
        //     $s->latitude = $school['latitude'];
        //     $s->longitude = $school['longitude'];
        //     $s->save();
        // }
    }
}
