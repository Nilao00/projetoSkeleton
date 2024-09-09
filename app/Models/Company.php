<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $table = 'companies';
    
    protected $fillable = [
        'fantasy_name',
        'cnpj',
        'phone',
        'email',
        'is_active',
        'adress_id',
    ];

    public function adress()
    {
        return $this->belongsTo(Adress::class);
    }
}