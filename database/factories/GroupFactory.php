<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Group;

class GroupFactory extends Factory
{
    protected $model = Group::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'title' => $this->faker->name(),
            'content' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'deadline' => date("m.d.y"),
            'reword' => mt_rand(1000, 100000),
            'number_applicants' => mt_rand(1, 5),
            'number_selection' => mt_rand(1, 5),
            'required_skill' =>$this->faker->name(),
            'user_id' => mt_rand(1, 10),
            'term_of_apply' => 	date("m.d.y"),
            'term_of_selection' => date("m.d.y"),
            'created_at' => date("m.d.y"),
            'updated_at' => date("m.d.y"),
            'deleted_at' => null
        ];
    }
}
