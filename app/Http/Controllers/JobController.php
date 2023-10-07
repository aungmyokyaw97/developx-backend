<?php

namespace App\Http\Controllers;

use App\DataTables\JobDataTable;
use App\Http\Requests\CreateJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\JobRepository;
use Illuminate\Http\Request;
use Flash;

class JobController extends AppBaseController
{
    /** @var JobRepository $jobRepository*/
    private $jobRepository;

    public function __construct(JobRepository $jobRepo)
    {
        $this->middleware('auth:admin');
        $this->jobRepository = $jobRepo;
    }

    /**
     * Display a listing of the Job.
     */
    public function index(JobDataTable $jobDataTable)
    {
        abort_unless(auth()->user()->hasPermissionTo('job'),401);

        return $jobDataTable->render('backend.jobs.index');
    }

    /**
     * Show the form for creating a new Job.
     */
    public function create()
    {
        abort_unless(auth()->user()->hasPermissionTo('job'),401);
        return view('backend.jobs.create');
    }

    /**
     * Store a newly created Job in storage.
     */
    public function store(CreateJobRequest $request)
    {
        $input = $request->all();

        $job = $this->jobRepository->create($input);

        Flash::success('Job saved successfully.');

        return redirect(route('jobs.index'));
    }

    /**
     * Display the specified Job.
     */
    public function show($id)
    {
        abort_unless(auth()->user()->hasPermissionTo('job'),401);
        $job = $this->jobRepository->find($id);

        if (empty($job)) {
            Flash::error('Job not found');

            return redirect(route('jobs.index'));
        }

        return view('backend.jobs.show')->with('job', $job);
    }

    /**
     * Show the form for editing the specified Job.
     */
    public function edit($id)
    {
        abort_unless(auth()->user()->hasPermissionTo('job'),401);
        $job = $this->jobRepository->find($id);

        if (empty($job)) {
            Flash::error('Job not found');

            return redirect(route('jobs.index'));
        }

        return view('backend.jobs.edit')->with('job', $job);
    }

    /**
     * Update the specified Job in storage.
     */
    public function update($id, UpdateJobRequest $request)
    {
        $job = $this->jobRepository->find($id);

        if (empty($job)) {
            Flash::error('Job not found');

            return redirect(route('jobs.index'));
        }

        $job = $this->jobRepository->update($request->all(), $id);

        Flash::success('Job updated successfully.');

        return redirect(route('jobs.index'));
    }

    /**
     * Remove the specified Job from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        abort_unless(auth()->user()->hasPermissionTo('job'),401);
        $job = $this->jobRepository->find($id);

        if (empty($job)) {
            Flash::error('Job not found');

            return redirect(route('jobs.index'));
        }

        $this->jobRepository->delete($id);

        Flash::success('Job deleted successfully.');

        return redirect(route('jobs.index'));
    }
}
