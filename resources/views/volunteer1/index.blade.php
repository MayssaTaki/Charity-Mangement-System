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
<a class="btn  btn-success" href="volunteer1/create" Style="margin-top:0%;margin-left:30%;margin-bottom:2%;width:40%;">create volunteer</a>
<a class="btn  btn-success" href="{{route('volunteer1s.export') }}"  Style="margin-top:0%;margin-left:86%;margin-bottom:2%;">Export to Excel </a>
<table id="mytable" class="display">
<thead>
<tr>
<th>name</th>
<th>role</th>
<th>study</th>
<th>phone</th>
<th>address</th>
<th>previous_expreience</th>
<th>email</th>
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
			url: "{{'pagination-volunteer1'}}",
		},
	 columns: [ 
		{data:'name'},
            {data:'role'},
		   {data:'study'},
		   {data:'phone'},
		   {data:'address'},
		   {data:'previous_experience'},
		   {data:'email'},
			{data:'action'},
			
			 ],
		
	})	
	});
</script>
