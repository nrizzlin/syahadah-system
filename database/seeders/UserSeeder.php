<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Specify the number of users you want to seed
        // User::factory(7)->create();
        User::factory()->create([
            'name' => 'Nur Izzlin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('test12345'),
            'usertype' => 'admin',
            'specialist_id' =>null,
            'gender' => 'female',
            'age'=>'27',
            'facebook_page' =>'MRM Volunteer',
            'country' => 'Malaysia',
            'status' =>'active',
            'city' => 'Kuala Lumpur',
            'phone_number' => '0174741431',
            'previous_religion' => null,
            'syahadah_date' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        
        User::factory()->create([
            'name' => 'Azlina Zainuddin',
            'email' => 'daie@gmail.com',
            'password' => bcrypt('test12345'),
            'usertype' => 'daie',
            'specialist_id' =>null,
            'gender' => 'female',
            'age'=>'40',
            'facebook_page' =>'azlinPage',
            'country' => 'Malaysia',
            'status' =>'active',
            'city' => 'Kuala Lumpur',
            'phone_number' => '0187849536',
            'previous_religion' => null,
            'syahadah_date' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        User::factory()->create([
            'name' => 'Zainul Abidin',
            'email' => 'mentor@gmail.com',
            'password' => bcrypt('test12345'),
            'usertype' => 'mentor',
            'specialist_id' =>null,
            'gender' => 'male',
            'age'=>'29',
            'facebook_page' =>'Bidin Zaifa',
            'country' => 'Malaysia',
            'status' =>'active',
            'city' => 'Kuala Lumpur',
            'phone_number' => '0198734596',
            'previous_religion' => null,
            'syahadah_date' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        User::factory()->create([
            'name' => 'Jeremy Lau',
            'email' => 'mualaf@gmail.com',
            'password' => bcrypt('test12345'),
            'usertype' => 'mualaf',
            'specialist_id' =>null,
            'gender' => 'male',
            'age'=>'30',
            'facebook_page' =>'JLau Page',
            'country' => 'Malaysia',
            'status' =>'active',
            'city' => 'Ampang',
            'phone_number' => '0178495873',
            'previous_religion' => 'Christian',
            'syahadah_date' => '2022-12-27',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        User::factory()->create([
            'name' => 'Azhar Sabri',
            'email' => 'daietest@gmail.com',
            'password' => bcrypt('test12345'),
            'usertype' => 'daie,mentor',
            'specialist_id' =>null,
            'gender' => 'male',
            'age'=>'45',
            'facebook_page' =>'Ustaz Azhar',
            'country' => 'Malaysia',
            'status' =>'active',
            'city' => 'Petaling Jaya',
            'phone_number' => '0129893456',
            'previous_religion' => null,
            'syahadah_date' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}