@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <span class="header-title-size">Profile</span>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">
            @role('root-admin')
            {!! Form::model($admin, ['route' => ['profile.update'], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    <!-- Role Id Field -->
                    <input type="hidden" name="role_id" value="{{$admin->role_id}}">
                    <!-- Name Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                    </div>

                    <!-- Email Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('email', 'Email:') !!}
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Password Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('password', 'Password:') !!}
                        <input type="text" name="password" class="form-control" placeholder="Password">
                    </div>
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
                <a href="{{ route('home') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}
            @endrole
        </div>
    </div>
@endsection
