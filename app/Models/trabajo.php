<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trabajo extends Model
{
    use HasFactory;
    protected $fillable  = ['Nombre','Salario', 'Demanda','Oferta'];
}
