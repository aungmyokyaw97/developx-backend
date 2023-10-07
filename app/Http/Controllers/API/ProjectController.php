<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectListResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return ProjectListResource::collection($projects);
        //return response()->json($projects);
    }

    public function detail(Request $request)
    {
        $this->validate($request, [
            'id' => 'required'
        ]);
        $id = Hashids::decode($request->id);
        $project = Project::findOrFail((int)$id);
        return new ProjectListResource($project);
    }

}
