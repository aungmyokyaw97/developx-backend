@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <span class="header-title-size">Create Admin</span>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">
            @role('root-admin')
            {!! Form::open(['route' => 'admins.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('backend.admins.fields')
                </div>

            </div>
            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                <a href="{{ route('admins.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}
            @endrole
        </div>
    </div>
@endsection
