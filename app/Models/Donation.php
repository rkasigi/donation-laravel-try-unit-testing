<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $table = 'donations';
    protected $primaryKey = 'donation_id';

    protected $fillable = ['debit', 'credit', 'balance'];


}
