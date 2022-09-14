<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillSet extends Model
{
    use HasFactory;
    protected $table = "skill_set";
    protected $fillable = [
        'candidate_id','skill_id'
    ];
}
