<?php

namespace Database\Factories\Admin;

use App\Models\Admin\AdminCliente;
use App\Models\Admin\AdminUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminClienteFactory extends Factory
{

    protected $model = AdminCliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(2, true),
            'account' => $this->faker->slug(2),
            'designacao'  =>$this->faker->words(5, true) . ", Lda",
            'contact' => '9' . $this->faker->randomNumber(8, true),
            'email' => 'oridigitais+fakedata' .$this->faker->randomNumber(6, true) . '@gmail.com',
            'slug' => $this->faker->unique()->slug(4),
            'address' => $this->faker->address(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'nif' => '5' . $this->faker->randomNumber(8, true),
            'admin_user_id' => AdminUser::inRandomOrder()->first()->id,
            'table_id' =>  "db_" . str_replace("-", "_", $this->faker->slug(2)),
            'status' => $this->faker->numberBetween(0, 1),
        ];
    }
}
