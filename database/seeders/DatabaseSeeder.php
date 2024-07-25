<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(1)->create(); // this will create 10 dummy users
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@gmail.com',
        ]);
        
        Listing::factory(6)->create([
            'user_id' => $user->id,
        ]);

        // Listing::create([  // this will simply add the below value to the db when --seed is run
        //     'title'=>'test',
        //     'tags'=>'test',
        //     'company'=>'test',
        //     'location'=>'test',
        //     'email'=>'test',
        //     'website'=>'test',
        //     'description'=>'test',
        // ]);

        // Listing::factory(6)->create(); // 6 entries
    } 
}
