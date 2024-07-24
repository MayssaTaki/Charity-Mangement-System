@extends('adminlte::page')
@section('content')

<div class="small-box bg-gradient-success">
  <div class="inner">
    <h5>{{ $volunteer }}</h5>
    <p>volunteer_request</p>
  </div>
  <div class="icon">
    <i class="fas fa-user-plus"></i>
  </div>
  <a href="{{url('volunteer')}}" class="small-box-footer">
    More info <i class="fas fa-arrow-circle-right"></i>
  </a>
</div>

<div class="small-box bg-info">
  <div class="inner">
    <h5>{{ $campaign_request }}</h5>
    <p>campaign_request</p>
  </div>
  <div class="icon">
    <i class="fa fa-medkit"></i>
  </div>
  <a href="{{url('campaign_request')}}" class="small-box-footer">
    More info <i class="fas fa-arrow-circle-right"></i>
  </a>
</div>



<div class="small-box bg-gradient-danger" >
  <div class="inner">
    <h5>{{ $human_case }}</h5>
    <p>human_case_request</p>
  </div>
  <div class="icon">
    <i class="fa fa-heartbeat"></i>
  </div>
  <a href="{{url('human_case')}}" class="small-box-footer">
    More info <i class="fas fa-arrow-circle-right"></i>
  </a>
</div>
<div class="small-box bg-gradient-warning" >
  <div class="inner">
    <h5>{{ $campaign }}</h5>
    <p>campaign</p>
  </div>
  <div class="icon">
    <i class="fas fa-gift"></i>
  </div>
  <a href="{{url('campaign')}}" class="small-box-footer">
    More info <i class="fas fa-arrow-circle-right"></i>
  </a>
</div>






@endsection


