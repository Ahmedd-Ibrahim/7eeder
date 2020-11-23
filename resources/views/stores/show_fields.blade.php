<!-- Created At Field -->
<div class="form-group">
   {{ Form::label('created_at',__('store.Created At:'),[],false) }}
    <p>{{ $store->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {{ Form::label('updated_at',__('store.Updated:'),[],false) }}
    <p>{{ $store->updated_at }}</p>
</div>

{{--<!-- Id Field -->--}}
{{--<div class="form-group">--}}
{{--    {!! Form::label('id', 'Id:') !!}--}}
{{--    <p>{{ $store->id }}</p>--}}
{{--</div>--}}

<!-- Name Field -->
<div class="form-group">
    {{ Form::label('name',__('store.name:'),[],false) }}
    <p>{{ $store->name }}</p>
</div>

<!-- Phone Field -->
<div class="form-group">
    {{ Form::label('phone',__('store.Phone:'),[],false) }}
    <p>{{ $store->phone }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {{ Form::label('address',__('store.address:'),[],false) }}
    <p>{{ $store->address }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {{ Form::label('image',__('store.image:'),[],false) }}
    <p class="image"><img style="max-height: 400px;width: 100%" src="{{$store->image}}"></p>
</div>

<!-- Views Field -->
<div class="form-group">
    {{ Form::label('views',__('store.views:'),[],false) }}
    <p>{{ $store->views }}</p>
</div>

<!-- Active Field -->
<div class="form-group">
    {{ Form::label('active',__('store.active:'),[],false) }}

    <p>{{ $store->active }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {{ Form::label('user_id',__('store.user name:'),[],false) }}
    <p>{{ $store->User->name }}</p>
</div>
