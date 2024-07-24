@extends("adminlte::page")
@section('content')
<div class="card" style="width: 18rem;">




  <div class="card-body">
   
<h2 style="color:brown; text-align:center;"><strong>{{$campaign->Name}}</strong></h2>
<h5  style="color:brown;" class="card-title"><b>Description :</b></h5><p ><b>{{$campaign->Description}}</b></p>
<h5   style="color:brown;" class="card-title"><b>Donation_amount :</b></h5><p ><b>{{$campaign->Donation_amount}}</b></p>
  </div>
</div>
@endsection