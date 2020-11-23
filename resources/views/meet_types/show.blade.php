@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('meet.Meet Types')
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('meet_types.show_fields')
                    <a href="{{ route('meetTypes.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
