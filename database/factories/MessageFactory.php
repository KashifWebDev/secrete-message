<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{

    protected $model = Message::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'text' => $this->faker->sentence,
            'recipient' => $this->faker->userName,
            'key' => $this->faker->password, // Adjust as per your requirements
            'expiry' => $this->faker->dateTimeBetween('+1 day', '+1 week'),
            'read_at' => null,
            'deleted_at' => null,
        ];
    }
}
