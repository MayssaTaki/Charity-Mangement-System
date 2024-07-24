<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Donation_amount</th>
           
</tr></thead>
<tbody>
    @foreach($campaign as $c)
    <tr>
        <td>{{$c->Name}}</td>
        <td>{{$c->Description}}</td>
        <td>{{$c->Donation_amount}}</td>
    
</tr>
@endforeach
</tbody>
</table>