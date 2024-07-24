<table>
    <thead>
        <tr>
            <th>name</th>
            <th>number_of_family_member</th>
            <th>work</th>
            <th>address</th>
            <th>phone</th>
            <th>campaign</th>
            
</tr></thead>
<tbody>
    @foreach($poor_family as $p)
    <tr>
        <td>{{$p->name}}</td>
        <td>{{$p->number_of_family_member}}</td>
        <td>{{$p->work}}</td>
        <td>{{$p->area->name}}</td>
        <td>{{$p->phone}}</td>
        <td>{{$p->campaign->Name}}</td>
        
</tr>
@endforeach
</tbody>
</table>