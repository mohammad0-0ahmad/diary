<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Diary>
 */
class DiaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date' => fake()->date(),
            'privacy' => null,
            'content' => fake()->text(),
        ];
    }

    /**
     * Indicate that the model's privacy is private
     *
     * @return static
     */
    function public () {
        return $this->state(fn(array $attributes) => [
            'privacy' => null,
        ]);
    }

    /**
     * Indicate that the model's privacy is private.
     *
     * @return static
     */
    function private () {
        return $this->state(fn(array $attributes) => [
            'privacy' => "[]",
        ]);
    }

}