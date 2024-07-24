<table>
    <thead>
        <tr>
            <th>Address</th>
            <th>The campaign</th>
            <th>Date_first</th>
            <th>Date_End</th>
            <th>Timer</th>
           
</tr></thead>
<tbody>
    @foreach($send_campaign as $c)
    <tr>
        <td>{{$c->area->name}}</td>
        <td>{{$c->campaign->Name}}</td>
        <td>{{$c->Date_first}}</td>
        <td>{{$c->Date_End}}</td>
        <td>{{$c->Timer}}</td>
    
</tr>
@endforeach
</tbody>
</table>