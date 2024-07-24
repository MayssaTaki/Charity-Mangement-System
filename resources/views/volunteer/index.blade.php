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


<table id="mytable" class="display">
<thead>
<tr>
<th>Name</th>
<th>study</th>
<th>Previous_experience</th>
<th>purpose</th>
<th>phone</th>
<th>address</th>






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
			url: "{{'pagination-volunteer'}}",
		},
	 columns: [ 
		{data:'Name'},
        {data:'study'},
		{data:'Previous_experience'},
            {data:'purpose'},
            {data:'phone'},
            {data:'address'},
		
          
		  
			
			 ],
		
	})	
	});
</script>
