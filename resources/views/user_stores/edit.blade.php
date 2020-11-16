@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            User Store
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($userStore, ['route' => ['userStores.update', $userStore->id], 'method' => 'patch']) !!}

                        @include('user_stores.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection