<?php

namespace Database\Factories\Modules\Auth\Models;

use App\Modules\Auth\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * Factory para crear usuarios de prueba
 * 
 * @author Eze Chavez
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Modules\Auth\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * El modelo asociado al factory.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define el estado por defecto del modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // password por defecto
            'remember_token' => Str::random(10),
            'edit_user_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }

    /**
     * Indica que el email del usuario no está verificado.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
} 