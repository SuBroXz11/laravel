<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // sentence() city() etc below all are methods
            'title'=>$this->faker->sentence(),
            'tags'=>'laravel, api, backend',
            'company'=>$this->faker->company(),
            'email'=>$this->faker->companyEmail(),
            'website'=>$this->faker->url(),
            'location'=>$this->faker->city(),
            'description'=>$this->faker->paragraph(5),
            'user_id' => User::factory(), // This ensures the user_id is created if not provided
        ];
    }
}
