@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <span class="header-title-size">Create Role</span>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">
            @role('root-admin')
            {!! Form::open(['route' => 'roles.store']) !!}

            <div class="card-body">

                <div class="row">
                    <!-- Name Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    <!-- Permission Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('permission', 'Permissions:') !!}

                            @foreach ($permissions as $key=>$name)
                            <div class="row form-group col-sm-12">
                                <input type="checkbox" name="permissions[]" value="{!! $name !!}" id="{{ $key }}" class="form-check"/>
                                <label class="form-check" style="margin-top: 5px" for="{{ $key }}">{!! ucfirst($name) !!}</label>
                            </div>
                            @endforeach
                    </div>
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('roles.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}
            @endrole
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Select2 Multiple
        $('#permission').select2({
            placeholder: "Select Permissions",
            allowClear: true
        });

    });

</script>
@endpush
