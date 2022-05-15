<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => mt_rand(1, 4),
            'group_id' => mt_rand(4, 25),
            'status' => '1',
            'comment' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'created_at' => date("m.d.y"),
            'updated_at' => date("m.d.y"),
            'deleted_at' => null
        ];
    }
}
