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
         <h2> <i class="fas fa-plus"> Edit Campaign</i> </h2> 
        </div>
		   </div>
        </div>

    </div>
</div>
<form action="{{route('campaign.update',$campaign->id)}}" method="POST" enctype="multipart/form-data">

@csrf
{{method_field('PATCH')}}
<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="Name" value="{{$campaign->Name}}" class="form-control" placeholder="Name">
            </div>
        </div>
   <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <input type="text" name="Description" value="{{$campaign->Description}}" class="form-control" placeholder="Description">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Donation_amount:</strong>
                <input type="number" name="Donation_amount" value="{{$campaign->Donation_amount}}" class="form-control" placeholder="Donation amount">
            </div>
        </div>
		 



<input type="submit" value="save"/>
</form>
</div>
@endsection