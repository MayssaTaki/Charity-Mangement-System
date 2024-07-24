@extends("adminlte::page")
@section('content')
<div class="card" style="width: 18rem;">
<img src="{{ asset('storage/' . $human_case->image) }}" alt="photo" class="img-fluid">

  <div class="card-body">
   
<h2 style="color:brown; text-align:center;"><strong>{{$human_case->Name}}</strong></h2>
<h5  style="color:brown;" class="card-title"><b>Explanation_of_the_situation :</b></h5><p ><b>{{$human_case->Explanation_of_the_situation}}</b></p>
<h5   style="color:brown;" class="card-title"><b>The_amount_required :</b></h5><p ><b>{{$human_case->The_amount_required}}</b></p>
  </div>
</div>
@endsection