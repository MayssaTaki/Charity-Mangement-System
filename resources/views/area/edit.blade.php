@extends("adminlte::page")
@section('content')
<div Style="background-color:white;border-top:solid 3px red;padding:1%;">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
<div Style="background-color:white;border-bottom: 0.9px solid gray;color:gray;">           
		     <div Style="padding-top:1%;" >
         <h2> <i class="fas fa-plus"> Edit Area</i> </h2> 
        </div>
		   </div>
        </div>

    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{route('area.update',$area->id)}}" method="POST" enctype="multipart/form-data">

@csrf
{{method_field('PATCH')}}
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text"  value="{{$area->name}}" name="name" class="form-control" placeholder="Area">
            </div>
        </div>
	
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary" event="{{ route('area.index')}}">Submit</button>
        </div>
		 <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('area.index') }}"> Back</a>
        </div>
    </div>
</form>
</div>
@endsection