@extends("adminlte::page")
@section('content')
@if ($errors->any())
    <div>
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        
            @foreach ($errors->all() as $error)
               {{ $error }}
            @endforeach
       
    </div>
@endif
<div Style="background-color:white;border-top:solid 3px red;padding:1%;">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
<div Style="background-color:white;border-bottom: 0.9px solid gray;color:gray;">           
		     <div Style="padding-top:1%;" >
         <h2> <i class="fas fa-plus"> Edit volunteer</i> </h2> 
        </div>
		   </div>
        </div>

    </div>
</div>
<form action="{{route('volunteer1.update',$volunteer1->id)}}" method="POST" enctype="multipart/form-data">

@csrf
{{method_field('PATCH')}}
<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text"  value="{{$volunteer1->name}}" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email"  value="{{$volunteer1->email}}" name="email" class="form-control" placeholder="Email">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>phone:</strong>
                <input type="number"  value="{{$volunteer1->phone}}" name="phone" class="form-control" placeholder="phone">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>study:</strong>
                <input type="text" value="{{$volunteer1->study}}" name="study" class="form-control" placeholder="study">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>address:</strong>
                <input type="text" value="{{$volunteer1->address}}" name="address" class="form-control" placeholder="address">
            </div>
        </div>
   <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>previous_experience:</strong>
                <input type="text" value="{{$volunteer1->previous_experience}}"  name="previous_experience" class="form-control" placeholder="previous_experience">
            </div>
        </div>

 

   <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role:</strong>
                <select name="volunteer_role_id">
@foreach ($volunteer-roleIds as $c)
<option value="{{$c->id}}">{{$c->type}}</option>
@endforeach
</select>  </div>
        </div>


<input type="submit" value="save"/>
</form>
</div>
@endsection