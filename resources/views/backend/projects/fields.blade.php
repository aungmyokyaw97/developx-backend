<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Sub Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sub_title', 'Sub Title:') !!}
    {!! Form::text('sub_title', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Thumbnail Field -->
<div class="form-group col-sm-6">
    {!! Form::label('thumbnail', 'Thumbnail:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('thumbnail') !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>
<!-- App Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('app_image', 'App Image:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('app_image[]', ['multiple' => 'multiple']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>

<!-- Web Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('web_image', 'Web Image:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('web_image[]', ['multiple' => 'multiple']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>
