@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Complaint
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($complaint, ['route' => ['complaints.update', $complaint->id], 'method' => 'patch']) !!}

                        @include('complaints.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection