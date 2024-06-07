<?php

namespace App\Models;

//هذا الملف يستخدم للوكن ان

use Illuminate\Database\Eloquent\Model;

class Book extends Model 
{

    // الخصائص الأخرى والطرق...

    protected $fillable = [
        'name', 'writer', 'info',
    ];

 
}
