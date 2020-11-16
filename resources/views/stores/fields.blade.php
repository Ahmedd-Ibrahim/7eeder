<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::number('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'user:') !!}
    {!! Form::select('user_id', \App\Models\User::pluck('name','id'), null,['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image',null,['class'=>'test']) !!}
</div>
<div class="clearfix"></div>

<!-- Active Field -->
<div class="form-group col-sm-12">
    {!! Form::label('active', 'Active:') !!}
    <label class="radio-inline">
        {!! Form::radio('active', "active", true) !!} active
    </label>

    <label class="radio-inline">
        {!! Form::radio('active', "deactivate", null) !!}  deactivate
    </label>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('stores.index') }}" class="btn btn-default">Cancel</a>
</div>

