
<!-- meet_type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user', 'user name:') !!}
    {!! Form::select('user_id', \App\Models\User::pluck('name','id'),request('storeid'), ['class' => 'form-control','id'=>'user_id']) !!}
</div>

<div class="clearfix"></div>

<!-- Slaughter Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('store_id', 'Store Name:') !!}
    {!! Form::select('store_id', \App\Models\Store::pluck('name','id'),request('storeid'), ['class' => 'form-control','id'=>'store_id']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('userStores.index') }}" class="btn btn-default">Cancel</a>
</div>
