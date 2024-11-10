<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['contact_id', 'amount', 'invoice_date'];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
