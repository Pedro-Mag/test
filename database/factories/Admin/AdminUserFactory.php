<?php

namespace Database\Factories\Admin;

use App\Models\Admin\AdminRole;
use App\Models\Admin\AdminUser;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdminUserFactory extends Factory
{
        /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdminUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'iniciais' => $this->faker->lexify('??'),
            'slug' => $this->faker->unique()->slug(2),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'admin_role_id' => AdminRole::inRandomOrder()->first()->id,
            'password' => 'password', // password
            'remember_token' => Str::random(10),
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
