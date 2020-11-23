<!-- Created At Field -->
<div class="form-group">
    {{ Form::label('created_at',__('settings.created_at:'),[],false) }}
    <p>{{ $appSetting->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {{ Form::label('updated_at',__('settings.Updated At:'),[],false) }}
    <p>{{ $appSetting->updated_at }}</p>
</div>

<!-- Id Field -->
{{--<div class="form-group">--}}
{{--    {!! Form::label('id', 'Id:') !!}--}}
{{--    <p>{{ $appSetting->id }}</p>--}}
{{--</div>--}}

<!-- About Desc Field -->
<div class="form-group">
    {{ Form::label('about_desc',__('settings.About Desc:'),[],false) }}
    <p>{{ $appSetting->about_desc }}</p>
</div>

<!-- Term Desc Field -->
<div class="form-group">
    {{ Form::label('term_desc',__('settings.Term Desc:'),[],false) }}

    <p>{{ $appSetting->term_desc }}</p>
</div>

<!-- Condation Desc Field -->
<div class="form-group">
    {{ Form::label('condation_desc',__('settings.condition Desc:'),[],false) }}
    <p>{{ $appSetting->condation_desc }}</p>
</div>

<!-- App Share Link Field -->
<div class="form-group">
    {{ Form::label('app_share_link',__('settings.App Share Link:'),[],false) }}
    <p>{{ $appSetting->app_share_link }}</p>
</div>

<!-- App Review Link Field -->
<div class="form-group">
    {{ Form::label('app_review_link',__('settings.App Review Link:'),[],false) }}
    <p>{{ $appSetting->app_review_link }}</p>
</div>
