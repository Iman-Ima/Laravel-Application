<?php

namespace Tests\Unit;
use App\Models\Contact;
use Tests\TestCase;

class ContactTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this-> Contact::factory()->create();

        
        $form_data = [
            
            'civilite'        =>  'madamme',
            'prenom'          =>  'first prenom' ,
            'nom'             =>  'first nom' ,
            'telephone'       =>  'first telephone',
            'email'           =>  'first@dzd.com'  ,
            'fonction'        =>  'first fonction' ,
            'service'         =>   'first service' ,
            'date_naissonce'  =>  '16/11/1996',
            'nom_societe'     =>  'first nom_societe',
            'address'         =>   'first address'   ,
            'code_postal'     =>  'first code_postal',
            'ville'           =>  'first ville'     ,
            'tele_societe'    =>  'first tele_societe',
            'site_web'        =>  'first.com',
        ];

        $this->withoutExceptionHandling();
        $this->json('POST',route('contact.store').$form_data)
        ->assertStatus(201)
        ->assertJson(['data'=>$form_data])
        ;
    
    }
}
