<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $meetTypes->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $meetTypes->updated_at }}</p>
</div>

<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $meetTypes->id }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    <p><img src="{{ $meetTypes->image }}" alt=""></p>
</div>

<!-- Slaughter Date Field -->
<div class="form-group">
    {!! Form::label('slaughter_date', 'Slaughter Date:') !!}
    <p>{{ $meetTypes->slaughter_date }}</p>
</div>

<!-- Age Field -->
<div class="form-group">
    {!! Form::label('age', 'Age:') !!}
    <p>{{ $meetTypes->age }}</p>
</div>

<!-- Store Id Field -->
<div class="form-group">
    {!! Form::label('store_id', 'Store Id:') !!}
    <p>{{ $meetTypes->store_id }}</p>
</div>

