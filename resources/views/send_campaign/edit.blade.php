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
         <h2> <i class="fas fa-plus"> Edit time of campaign</i> </h2> 
        </div>
		   </div>
        </div>

    </div>
</div>
<form action="{{route('send_campaign.update',$send_campaign->id)}}" method="POST" enctype="multipart/form-data">

@csrf
{{method_field('PATCH')}}
<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
                <select name="area_id">
@foreach ($areaIds as $c)
<option value="{{$c->id}}">{{$c->name}}</option>
@endforeach
</select>  </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>The campaign:</strong>
                <select name="campaign_id">
@foreach ($campaignIds as $c)
<option value="{{$c->id}}">{{$c->Name}}</option>
@endforeach
</select>  </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date first:</strong>
                <input type="date" name="Date_first"  class="form-control" placeholder="Date">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date End:</strong>
                <input type="date" name="Date_End"  class="form-control" placeholder="Date">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Timer:</strong>
                <input type="time" name="Timer"  class="form-control" placeholder="time">
            </div>
   


<input type="submit" value="save"/>
</form>
</div>
@endsection