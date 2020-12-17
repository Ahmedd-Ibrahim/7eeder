    @extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            App Setting
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($appSetting, ['route' => ['appSettings.update', $appSetting->id], 'method' => 'patch']) !!}

                        @include('app_settings.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
