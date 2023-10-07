<?php

namespace App\Repositories;

use App\Models\Job;
use App\Repositories\BaseRepository;

class JobRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'title',
        'job_type',
        'salary',
        'description',
        'requirements',
        'start_date',
        'end_date',
        'active'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Job::class;
    }
}
