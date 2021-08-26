<?php

namespace Database\Factories;

use App\Models\Card;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Card::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $types = $this->faker->randomElement(['instant', 'sorcery', 'artifact', 'creature', 'enchantment', 'land', 'planeswalker']);
        $subtypes = $this->faker->randomElement(['trap', 'arcane', 'equipment', 'aura', 'human', 'rat', 'squirrel', '']);
        return [



            'name' => $this->faker->name(),
            'mana_cost' => $this->faker->randomDigit(),
            'mana_cost_converted' => $this->faker->randomDigit(),
            'colors' => $this->faker->randomElement(['white', 'blue', 'black', 'red', 'green']),
            'type' => $types . $subtypes,
            'types' => $types,
            'subtypes' => $subtypes,
            'rarity' => $this->faker->randomElement(['mythic rare', 'rare', 'uncommon', 'common', 'special', 'land']),
            'set' => $this->faker->randomElement(['M21', 'M11', 'M6']),
            'set_name' => $this->faker->randomElement(['Core Set 2021', 'Core Set 2011', 'Core Set 1996']),
            'text' => $this->faker->realText($maxNbChars = 60),
            'flavor' => $this->faker->realText($maxNbChars = 200),
            'artist' => $this->faker->name(),

            // these are actually strings in type
            'number' => $this->faker->randomNumber(3),
            'power' => $this->faker->randomDigit(),
            'toughness' => $this->faker->randomDigit(),
            
            'layout' => $this->faker->randomElement(['normal', 'split', 'flip', 'double-faced', 'token', 'plane', 'scheme', 'phenomenon', 'leveler', 'vanguard', 'aftermath']),
            'multiverseid' => $this->faker->randomNumber(6, true),
            'gatherer_image_url' => $this->faker->url(),
        ];
    }
}
