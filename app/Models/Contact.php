<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'civilite',
         'prenom',
         'nom',
         'email',
         'telephone',
         'fonction',
         'service',
         'date_naissonce',
         'nom_societe',
         'address',
         'code_postal',
         'ville',
         'tele_societe',
         'site_web'
       ];
}
