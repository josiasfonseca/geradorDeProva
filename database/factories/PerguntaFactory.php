<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PerguntaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pergunta' => $this->faker->name(),
            'dificuldade' => $this->faker->numberBetween(1,3),
            'respostas' => json_encode([]) ,
            'tipo_pergunta' => $this->faker->numberBetween(1,3),
            'rotulo' => Str::random(20)
        ];
    }

}
