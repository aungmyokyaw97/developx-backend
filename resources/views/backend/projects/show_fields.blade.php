<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $project->id }}</p>
</div>

<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $project->title }}</p>
</div>

<!-- Sub Title Field -->
<div class="col-sm-12">
    {!! Form::label('sub_title', 'Sub Title:') !!}
    <p>{{ $project->sub_title }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $project->description }}</p>
</div>

<!-- Thumbnail Field -->
<div class="col-sm-12">
    {!! Form::label('thumbnail', 'Thumbnail:') !!}<br>
    <img src="{{ asset('storage/images/thumbnail/'. $project->thumbnail) }}" height="100px" alt="">
</div>

@if($project->app_image != null)
<!-- App Image Field -->
<div class="col-sm-12"><br>
    {!! Form::label('app_image', 'App Image:') !!} <br>
    @foreach(json_decode($project->app_image) as $app_image)
        <img src="{{ asset('storage/images/app/'. $app_image) }}" height="100px" alt="">
    @endforeach
</div>
@endif
<br>
@if($project->web_image != null)
<!-- Web Image Field -->
<div class="col-sm-12"><br>
    {!! Form::label('web_image', 'Web Image:') !!}
    @foreach(json_decode($project->web_image) as $web_image)
        <img src="{{ asset('storage/images/web/'. $web_image) }}" height="100px" alt="">
    @endforeach
</div>
@endif

<!-- Created At Field -->

<div class="col-sm-12"><br>
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $project->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $project->updated_at }}</p>
</div>

