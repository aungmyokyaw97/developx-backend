<?php

namespace App\Http\Controllers;

use App\DataTables\ProjectDataTable;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;
use Flash;

class ProjectController extends AppBaseController
{
    /** @var ProjectRepository $projectRepository*/
    private $projectRepository;

    public function __construct(ProjectRepository $projectRepo)
    {
        $this->middleware('auth:admin');
        $this->projectRepository = $projectRepo;
    }

    /**
     * Display a listing of the Project.
     */
    public function index(ProjectDataTable $projectDataTable)
    {
        abort_unless(auth()->user()->hasPermissionTo('project'),401);

        return $projectDataTable->render('backend.projects.index');
//        $projects = $this->projectRepository->paginate(10);
//
//        return view('backend.projects.index')
//            ->with('projects', $projects);
    }

    /**
     * Show the form for creating a new Project.
     */
    public function create()
    {
        abort_unless(auth()->user()->hasPermissionTo('project'),401);
        return view('backend.projects.create');
    }

    /**
     * Store a newly created Project in storage.
     */
    public function store(CreateProjectRequest $request)
    {

        $input = $this->handleFileUpload($request);

        $project = $this->projectRepository->create($input);

        Flash::success('Project saved successfully.');

        return redirect(route('projects.index'));
    }

    private function handleFileUpload($request)
    {
        $data = $request->all();

        if ($request->hasFile('thumbnail')) {
            $url = $request->file('thumbnail');
            $data['thumbnail'] = $this->moveFile($url,'images/thumbnail/');
        }

        if ($request->hasFile('app_image')) {
            $url = $request->file('app_image');
            $imageList = [];
            foreach ($url as $file) {
                $fileName = $this->moveFile($file,'images/app/');
                array_push($imageList, $fileName);
            }
            $data['app_image'] = json_encode($imageList);
        }

        if ($request->hasFile('web_image')) {
            $url = $request->file('web_image');
            $imageList = [];
            foreach ($url as $file) {
                $fileName = $this->moveFile($file,'images/web/');
                array_push($imageList, $fileName);
            }
            $data['web_image'] = json_encode($imageList);
        }

        return $data;
    }

    private function moveFile($file,$dir){
        $extension = $file->getClientOriginalExtension();
        $fileName = \Str::random(10) . '.' . $extension;
        $path = $dir . $fileName;
        \Storage::disk('public')->put($path, file_get_contents($file));
        return $fileName;
    }

    /**
     * Display the specified Project.
     */
    public function show($id)
    {
        abort_unless(auth()->user()->hasPermissionTo('project'),401);
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        return view('backend.projects.show')->with('project', $project);
    }

    /**
     * Show the form for editing the specified Project.
     */
    public function edit($id)
    {
        abort_unless(auth()->user()->hasPermissionTo('project'),401);
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        return view('backend.projects.edit')->with('project', $project);
    }

    /**
     * Update the specified Project in storage.
     */
    public function update($id, UpdateProjectRequest $request)
    {
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        $input = $this->handleFileUpload($request);

        $project = $this->projectRepository->update($input, $id);

        Flash::success('Project updated successfully.');

        return redirect(route('projects.index'));
    }

    /**
     * Remove the specified Project from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        abort_unless(auth()->user()->hasPermissionTo('project'),401);
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        $this->projectRepository->delete($id);

        Flash::success('Project deleted successfully.');

        return redirect(route('projects.index'));
    }
}
