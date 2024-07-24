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
<th>work</th>
<th>phone</th>
<th>address</th>
<th>situation</th>
<th>Explanation_of_the_situation</th>
<th>The_amount_required</th>
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
			url: "{{'pagination-human_case'}}",
		},
	 columns: [ 
		{data:'Name'},
            {data:'work'},
            {data:'phone'},
            {data:'address'},
			{data:'situation'},
            {data:'Explanation_of_the_situation'},
            {data:'The_amount_required'},
            {data:'action'},
		  
			
			 ],
		
	})	
	});
</script>
