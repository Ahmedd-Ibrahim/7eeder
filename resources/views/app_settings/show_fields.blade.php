<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $appSetting->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $appSetting->updated_at }}</p>
</div>

<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $appSetting->id }}</p>
</div>

<!-- About Desc Field -->
<div class="form-group">
    {!! Form::label('about_desc', 'About Desc:') !!}
    <p>{{ $appSetting->about_desc }}</p>
</div>

<!-- Term Desc Field -->
<div class="form-group">
    {!! Form::label('term_desc', 'Term Desc:') !!}
    <p>{{ $appSetting->term_desc }}</p>
</div>

<!-- Condation Desc Field -->
<div class="form-group">
    {!! Form::label('condation_desc', 'Condation Desc:') !!}
    <p>{{ $appSetting->condation_desc }}</p>
</div>

<!-- App Share Link Field -->
<div class="form-group">
    {!! Form::label('app_share_link', 'App Share Link:') !!}
    <p>{{ $appSetting->app_share_link }}</p>
</div>

<!-- App Review Link Field -->
<div class="form-group">
    {!! Form::label('app_review_link', 'App Review Link:') !!}
    <p>{{ $appSetting->app_review_link }}</p>
</div>

