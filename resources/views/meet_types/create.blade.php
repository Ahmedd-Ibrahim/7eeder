@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Meet Types
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'meetTypes.store', 'files' => true]) !!}

                        @include('meet_types.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
