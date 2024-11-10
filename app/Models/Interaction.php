<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interaction extends Model
{
    use HasFactory;

    protected $fillable = ['contact_id', 'type', 'note'];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
