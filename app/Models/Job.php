<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public $table = 'jobs';

    public $fillable = [
        'title',
        'job_type',
        'salary',
        'description',
        'requirements',
        'start_date',
        'end_date',
        'active'
    ];

    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'job_type' => 'string',
        'salary' => 'string',
        'start_date' => 'date',
        'end_date' => 'date',
        'active' => 'boolean'
    ];

    public function scopeActive($query){
        $today = Carbon::today();
        return $query->whereDate('start_date', '<=', $today)->whereDate('end_date', '>=', $today)->where('active',1);
    }


}
