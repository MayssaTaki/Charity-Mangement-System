<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>address</th>
            <th>phone</th>
            <th>campaign</th>
            <th>Amount</th>
</tr></thead>
<tbody>
    @foreach($Cach_payment as $c)
    <tr>
        <td>{{$c->Name}}</td>
        <td>{{$c->address}}</td>
        <td>{{$c->phone}}</td>
        <td>{{$c->campaign->Name}}</td>
        <td>{{$c->Amount}}</td>
</tr>
@endforeach
</tbody>
</table>