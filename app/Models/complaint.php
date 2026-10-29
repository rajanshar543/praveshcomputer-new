<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class complaint extends Model
{
    protected $guarded=[];



    // 👇 ये लाइन जोड़ो ताकि visit_date को Carbon instance में cast करे
    protected $casts = [
        'visit_date' => 'date',
    ];
}
