<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Job Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('job_type', 'Job Type:') !!}
    {!! Form::select('job_type', ['Remote' => 'Remote', 'On Site' => 'On Site','Hybrid' => 'Hybrid'],null,['class' => 'custom-select form-control','placeholder' => 'Select Job Type']); !!}
</div>

<!-- Salary Field -->
<div class="form-group col-sm-6">
    {!! Form::label('salary', 'Salary:') !!}
    {!! Form::text('salary', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control','id' => 'job_description']) !!}
</div>

<!-- Requirements Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('requirements', 'Requirements:') !!}
    {!! Form::textarea('requirements', null, ['class' => 'form-control','id' => 'job_requirements']) !!}
</div>

<!-- Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_date', 'Start Date:') !!}
    {!! Form::text('start_date', null, ['class' => 'form-control','id'=>'start_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#start_date').datepicker()
    </script>
@endpush

<!-- End Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_date', 'End Date:') !!}
    {!! Form::text('end_date', null, ['class' => 'form-control','id'=>'end_date']) !!}
</div>



<!-- 'bootstrap / Toggle Switch Active Field' -->
<div class="form-group col-sm-6">
        <label>Active Status : </label>
        <input type="hidden" name="active" value="0">
        {!! Form::checkbox('active', 1 , $job->active ?? true ,  ['id' => 'toggle-two']) !!}

        {{--<input id="toggle-two" checked type="checkbox" />--}}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#end_date').datepicker()

        $(function() {
            $('#toggle-two').bootstrapToggle({
                on: 'Active',
                off: 'Inactive'
            });
        })
    </script>
@endpush
