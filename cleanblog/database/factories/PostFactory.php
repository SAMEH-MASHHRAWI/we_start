<?php

namespace Database\Factories;


use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->words(4,true);
        return [
            'title'=>$title,
            'slug'=>Str::slug($title),
            'image'=>$this->faker->imageUrl(),
            'content'=>$this->faker->sentences(5,true),
            'user_id'=>$this->faker->numberBetween(1,10),
        ];
    }
}
