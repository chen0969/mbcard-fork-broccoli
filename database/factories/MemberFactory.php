<?php
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class MemberFactory extends Factory
{
    protected $model = \App\Member::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'account' => $this->faker->unique()->userName(),
            'password' => Hash::make('password'),
            'mobile' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'avatar' => $this->faker->imageUrl(),
            'banner' => $this->faker->imageUrl(),
            'birth_day' => $this->faker->date(),
            'address' => $this->faker->address(),
            'description' => $this->faker->paragraph(),
            'status' => true,
        ];
    }
}
