<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'sex' => mt_rand(0, 1),
            'email' => $this->faker->unique()->safeEmail(),
            'image' => null,
            'birthday' => date("m.d.y"),
            'email_verified_at' => date("m.d.y"),
            'password' => $this->faker->unique()->password(), // password
            'skill' => $this->faker->name(),
            'experience_year' => mt_rand(1, 15),
            'github' => null,
            'remember_token' => Str::random(10),
            'created_at' => date("m.d.y"),
            'updated_at' => date("m.d.y"),
            'deleted_at' => date("m.d.y")
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
