<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\JobResource;
use App\Models\Job;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;

class JobController extends Controller
{

    public function index()
    {
        $job = Job::active()->orderBy('id','DESC')->get();
        return JobResource::collection($job);
    }

    public function detail(Request $request)
    {
        $this->validate($request, [
            'id' => 'required'
        ]);
        $id = Hashids::decode($request->id);
        $job = Job::findOrFail($id[0]);
        return new JobResource($job);
    }

}
