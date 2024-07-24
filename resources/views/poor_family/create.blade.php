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
         <h2> <i class="fas fa-plus"> Add poor family</i> </h2> 
        </div>
		   </div>
        </div>

    </div>
</div>
<form action="{{route('poor_family.store')}}" method="POST" enctype="multipart/form-data">

@csrf 
<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>number_of_family_member:</strong>
                <input type="text" name="number_of_family_member" class="form-control" placeholder="number_of_family_member">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>work:</strong>
                <input type="text" name="work" class="form-control" placeholder="work">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>phone:</strong>
                <input type="number" name="phone" class="form-control" placeholder="phone">
            </div>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>address:</strong>
                <select name="area_id">
@foreach ($areaIds as $c)
<option value="{{$c->id}}">{{$c->name}}</option>
@endforeach
</select>  </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>campaign:</strong>
                <select name="campaign_id">
@foreach ($campaignIds as $c)
<option value="{{$c->id}}">{{$c->Name}}</option>
@endforeach
</select>  </div>
        </div>





<input type="submit" value="save"/>
</form>
</div>
@endsection