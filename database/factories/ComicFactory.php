<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\comic>
 */
class ComicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $this->faker->addProvider(new \Mmo\Faker\PicsumProvider($this->faker));
                
        return [
            'nombre'=>$this->faker->name(),
            'privado'=>$this->faker->randomElement($array=array('SI','NO')),
            'image'=>'comics/'.$this->faker->picsum('public/storage/comics','640','480',null,false),
            'editorial'=>$this->faker->randomElement($editorial=array('DC','Marvel','Vertigo','Salvat','Planeta')),
            'category_id'=>Category::all()->random()->id,
            'user_id'=>User::all()->random()->id
        ];
    }
}
