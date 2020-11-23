<!-- Created At Field -->
<div class="form-group">
    {{ Form::label('created_at',__('complaint.Created At:'),[],false) }}
    <p>{{ $complaint->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {{ Form::label('updated_at',__('complaint.Updated At:'),[],false) }}
    <p>{{ $complaint->updated_at }}</p>
</div>

{{--<!-- Id Field -->--}}
{{--<div class="form-group">--}}
{{--    {!! Form::label('id', 'Id:') !!}--}}
{{--    <p>{{ $complaint->id }}</p>--}}
{{--</div>--}}

<!-- Name Field -->
<div class="form-group">
    {{ Form::label('name',__('complaint.name:'),[],false) }}
    <p>{{ $complaint->name }}</p>
</div>

<!-- Phone Field -->
<div class="form-group">
    {{ Form::label('phone',__('complaint.phone:'),[],false) }}
    <p>{{ $complaint->phone }}</p>
</div>

<!-- Message Field -->
<div class="form-group">
    {{ Form::label('message',__('complaint.message:'),[],false) }}
    <p>{{ $complaint->message }}</p>
</div>


<!-- User Id Field -->
<div class="form-group">
    {{ Form::label('user_id',__('complaint.user:'),[],false) }}
    <p>{{ $complaint->User->name }}</p>
</div>

