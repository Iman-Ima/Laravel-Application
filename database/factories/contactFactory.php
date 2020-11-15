<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class contactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'civilite'        =>  $this->$faker->civilite,
            'prenom'          =>  $this-> $faker->prenom,
            'nom'             =>  $this-> $faker->nom,
            'telephone'       =>  $this-> $faker->phoneNumber ,
            'email'           =>  $this->$faker->email,
            'fonction'        =>  $this->$faker->fonction,
            'service'         =>  $this->$faker->service,
            'date_naissonce'  =>  $this-> $faker->date_naissonce,
            'nom_societe'     =>  $this->$faker->nom_societe,
            'address'         =>  $this->$faker->address,
            'code_postal'     =>  $this->$faker->code_postal,
            'ville'           =>  $this->$faker->ville,
            'tele_societe'    =>  $this->$faker->phoneNumber ,
            'site_web'        =>  $this->$faker->site_web
            
        ];
    }
}
