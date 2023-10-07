@extends('layouts.app')

@push('page_css')
<style>
    .header-circle {
        height: 50px;
        width: 50px;
        border-radius: 50%;
        display: inline-block;
        text-align: center;
        padding-top: 16px;
        margin-top: 50px;
        margin-bottom: 20px;
    }
    .card-color {
        margin-top: 1rem;
        margin-left: 1rem;
        margin-right: 1rem;
        background-color: #FFF7ED;
    }
</style>
@endpush

@section('content')
<section class="content-header"></section>
<div class="content px-3">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>
                        <i class="fa fa-project-diagram"></i> Total Projects
                    </h3>
                </div>
                <div class="card-body">
                    <h1 class="text-center">{{$project}}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>
                        <i class="fa fa-tasks"></i> Total Active Jobs
                    </h3>
                </div>
                <div class="card-body">
                    <h1 class="text-center">{{$job}}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
