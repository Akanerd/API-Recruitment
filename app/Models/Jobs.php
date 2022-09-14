<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Fnematov\Userstamps\UserstampsTrait;

class Jobs extends Model
{
    use HasFactory;
    use UserstampsTrait;

    protected $fillable = [
        'name'
    ];

}
