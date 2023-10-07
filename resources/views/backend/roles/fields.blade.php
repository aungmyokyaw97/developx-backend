<!-- Role Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role_id', 'Role:') !!}
    {!! Form::select('role_id',  $roles, null, ['class' => 'form-control', 'placeholder' => 'Select Roles' ,'id' => 'roles']) !!}
</div>


