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
<a class="btn  btn-success" href="poor_family/create" Style="margin-top:0%;margin-left:30%;margin-bottom:2%;width:40%;">create poor_family</a>
<a class="btn  btn-success" href="{{route('poor_families.export') }}"  Style="margin-top:0%;margin-left:86%;margin-bottom:2%;">Export to Excel</a>
<table id="mytable" class="display">
<thead>
<tr>
<th>name</th>
<th>number_of_family_member</th>
<th>work</th>
<th>address</th>
<th>phone</th>
<th>campaign</th>
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
			url: "{{'pagination-poor_family'}}",
		},
	 columns: [ 
		{data:'name'},
		{data:'number_of_family_member'},
		{data:'work'},
            {data:'address'},
           {data:'phone'},
		   {data:'campaign'},
			{data:'action'},
			
			 ],
		
	})	
	});
</script>
