<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qualifications extends Model
{
    //
    protected $fillable = [
        'user_id',
        'qualification_name',
        'university_name',
        'first_enrolled',
        'graduated',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
