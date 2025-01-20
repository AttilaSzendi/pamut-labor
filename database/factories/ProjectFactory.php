<?php

namespace Database\Factories;

use App\Enums\StatusEnum;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'status' => StatusEnum::random(),
            'contact_id' => function(){
                return Contact::factory()->create()->id;
            },
        ];
    }
}
