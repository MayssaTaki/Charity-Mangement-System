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
<th>campaign</th>
<th>email</th>
<th>ID_number</th>
<th>company_Bank</th>
<th>donation_value</th>
<th>phone</th>
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
			url: "{{'pagination-donor_campaign'}}",
		},
	 columns: [
            {data:'Name'},
		   {data:'campaign'},
		   {data:'email'},
		   {data:'ID_number'},
		   {data:'company_Bank'},
           {data:'donation_value'},
		   {data:'phone'},
		   {data:'action'},
		   
			 ],
		
	})	
	});
</script>