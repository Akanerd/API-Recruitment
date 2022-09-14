<?php

namespace App\Models;
use App\Models\Jobs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Fnematov\Userstamps\UserstampsTrait;

class Candidates extends Model
{
    use HasFactory;
    use UserstampsTrait;
    protected $fillable = [
        'name','job_id' , 'email', 'phone', 'year'
    ];

    public function job()
    {
        return $this->belongsTo(Jobs::class, 'job_id');
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, "skill_set", "candidate_id",  "skill_id");
    }
}
