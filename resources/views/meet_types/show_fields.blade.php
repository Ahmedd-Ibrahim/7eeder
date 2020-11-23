<!-- Created At Field -->
<div class="form-group">
    {{ Form::label('created_at',__('meet.Created At:'),[],false) }}
    <p>{{ $meetTypes->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {{ Form::label('updated_at',__('meet.Updated:'),[],false) }}
    <p>{{ $meetTypes->updated_at }}</p>
</div>

{{--<!-- Id Field -->--}}
{{--<div class="form-group">--}}
{{--    {!! Form::label('id', 'Id:') !!}--}}
{{--    <p>{{ $meetTypes->id }}</p>--}}
{{--</div>--}}

<!-- Image Field -->
<div class="form-group">
    {{ Form::label('image',__('meet.image:'),[],false) }}
    <p><img src="{{ $meetTypes->image }}" alt=""></p>
</div>

<!-- Slaughter Date Field -->
<div class="form-group">
    {{ Form::label('slaughter_dat',__('meet.Slaughter Date:'),[],false) }}

    <p>{{ $meetTypes->slaughter_date }}</p>
</div>

<!-- Age Field -->
<div class="form-group">
    {{ Form::label('age',__('meet.age:'),[],false) }}

    <p>{{ $meetTypes->age }}</p>
</div>

<!-- Store Id Field -->
<div class="form-group">
    {{ Form::label('store_id',__('meet.store owned:'),[],false) }}
    <p>{{ $meetTypes->Store->name }}</p>
</div>

