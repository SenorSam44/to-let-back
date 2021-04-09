<?php

namespace Database\Factories;

use App\Models\Residence;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResidenceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Residence::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->numberBetween(0, 1),
            'category' => $this->faker->numberBetween(0, 5),
            'owner_id' => $this->faker->randomDigitNotNull,
            'location' => json_encode( array( 'district' => $this->faker->numberBetween(0,6),
                                                'area' => $this->faker->numberBetween(0,600),
                                                'sector' => $this->faker->numberBetween(0,16),
                                                'road' => $this->faker->numberBetween(0,60),
                                                'address' => $this->faker->address)),

            'size' => $this->faker->numberBetween(100, 10000),
            'facing' => $this->faker->randomElement(['north', 'south', 'east', 'west']),
            'floor_no' => $this->faker->numberBetween(1,10),
            'floor_type' => $this->faker->numberBetween(0, 3),
            'dinning_type' => $this->faker->numberBetween(0, 3),
            'price' => $this->faker->numberBetween(1000, 100000),
            'service_charge' => $this->faker->numberBetween(100, 1000),
            'price_options' => json_encode($this->faker->randomElements(['negotiable', 'electricity', 'gas'])),
            'available_from' => $this->faker->numberBetween(1,12),
            'preferred_rental' => json_encode($this->faker->randomElements(['small', 'male', 'female'])),
            'details' => $this->faker->text,
            'other_facilities' =>json_encode( $this->faker->randomElements(['small', 'male', 'female'])),
            'image' => json_encode($this->faker->randomElements(['/public/images/'.$this->faker->randomDigitNotNull.'jpeg', '/public/images/'.$this->faker->randomDigitNotNull.'jpg', '/public/images/'.$this->faker->randomDigitNotNull.'png'])),

        ];
    }
}
