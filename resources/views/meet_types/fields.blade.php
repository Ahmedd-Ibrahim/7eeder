<!-- meet_type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('meet_type', 'meet type:') !!}
    {!! Form::text('meet_type', null, ['class' => 'form-control','id'=>'meet_type']) !!}
</div>

<div class="clearfix"></div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image') !!}
</div>
<div class="clearfix"></div>

<!-- Slaughter Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slaughter_date', 'Slaughter Date:') !!}
    {!! Form::text('slaughter_date', null, ['class' => 'form-control','id'=>'slaughter_date']) !!}
</div>

<!-- Slaughter Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('store_id', 'Store Name:') !!}
    {!! Form::select('store_id', \App\Models\Store::pluck('name','id'),request('storeid'), ['class' => 'form-control','id'=>'store_id']) !!}
</div>


@push('scripts')
    <script type="text/javascript">
        $('#slaughter_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Age Field -->
<div class="form-group col-sm-6">
    {!! Form::label('age', 'Age:') !!}
    {!! Form::number('age', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('meetTypes.index') }}" class="btn btn-default">Cancel</a>
</div>
