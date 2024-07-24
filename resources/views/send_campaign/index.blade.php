@extends('adminlte::page')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js" defer></script>
@section('content')
 @if ($message = Session::get('success'))
        <div id="not" class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
		<script>
		setTimeout(function() {
    $('#not').fadeOut('fast');
}, 3000); //
		</script>
    @endif
	<div Style="background-color:white;border-top:solid 3px blue;padding:2%;">
	<a class="btn  btn-success" href="send_campaign/create" Style="margin-top:0%;margin-left:30%;margin-bottom:2%;width:40%;">create time and date for sending of campaign</a>
<a class="btn  btn-success" href="{{route('send_campaigns.export') }}"  Style="margin-top:0%;margin-left:86%;margin-bottom:2%;">Export to Excel</a>

<table id="mytable" class="display">
<thead>
<tr>
<th>Address</th>
<th>The campaign</th>
<th>Date_first</th>
<th>Date_End</th>
<th>Timer</th>
<th>action</th>


</tr>
</thead>
<tbody>
<tr>
</tr>


</tbody>
</table>
</div>
@endsection

<script>

$(document).ready( function () {
    $('#mytable').DataTable({
		processing: true,
		serverSide:true,
		
		ajax:{
			url: "{{'pagination-send_campaign'}}",
		},
	 columns: [ 
		{data:'area'},
	{data:'campaign'},
    {data:'Date_first'},
	{data:'Date_End'},
	{data:'Timer'},
	{data:'action'},
			
			 ],
		
	})	
	});
</script>
