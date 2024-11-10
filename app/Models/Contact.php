<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'company', 'email', 'phone'];

    public function interactions()
    {
        return $this->hasMany(Interaction::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
