<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;


     protected $fillable = [
        'cpf',
        'rg',
        'cnh',
    ];



    public function user()
    {
        return $this->hasOne(User::class, 'documento_id');
    }

}
