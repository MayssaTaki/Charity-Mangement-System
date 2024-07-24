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
         <h2> <i class="fas fa-plus"> Edit User</i> </h2> 
        </div>
		   </div>
        </div>

    </div>
</div>
<form action="{{route('user.update',$user->id)}}" method="POST" enctype="multipart/form-data">

@csrf
{{method_field('PATCH')}}
<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text"  value="{{$user->username}}" name="username" class="form-control" placeholder="Name">
            </div>
        </div>
   <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email"  value="{{$user->email}}" name="email" class="form-control" placeholder="Email">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>phone:</strong>
                <input type="text"  value="{{$user->phone}}" name="phone" class="form-control" placeholder="phone">
            </div>
        </div>

   <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                <input type="password"  value="{{$user->password}}" name="password" class="form-control" placeholder="Password">
            </div>
        </div>



<input type="submit" value="save"/>
</form>
</div>
@endsection