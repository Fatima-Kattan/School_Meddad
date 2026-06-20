<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'birth_date',
        'classroom_id',
    ];

    protected $casts = [
    'birth_date' => 'date',
];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
