@extends('layouts.app')

@push ('page_css')
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-lite.css') }}">
@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        Edit Job
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($job, ['route' => ['jobs.update', $job->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('backend.jobs.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('jobs.index') }}" class="btn btn-default"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection

@push('page_scripts')
    <script src="{{ asset('plugins/summernote/summernote-lite.js') }}"></script>
    <script>
        $('#job_description,#job_requirements').summernote({
            tabsize: 2,
            fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18','22', '24', '36', '48'],
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['fontsize', ['fontsize']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['hr']],
                ['table', ['table']],
                ['fontSizes', ['fontSizes']],
                ['link',['link', ['linkDialogShow', 'unlink']]],
                // ['video', ['video']],
                ['view', ['codeview']],
                ['help', ['help']]
            ],
            callbacks: {
                onPaste: function (e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('text/html');
                    e.preventDefault();
                    var div = $('<div />');
                    div.append(bufferText);
                    div.find('*').removeAttr('style');
                    setTimeout(function () {
                        document.execCommand('insertHtml', false, div.html());
                    }, 10);
                }
            }
        });
        $('.note-editable').css('font-size','16px');
        $('.note-editor .note-editable').css('line-height',1.8);

    </script>
@endpush
