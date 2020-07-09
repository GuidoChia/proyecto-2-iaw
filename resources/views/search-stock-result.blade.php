<div class="container">
    <table class="table table-striped animated fadeIn" >
        <thead>
        <tr>
            <th>Reactive</th>
            <th>Expiration</th>
            <th>Stock</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rows as $row)
        <tr>
            <td>{{$reactive->name}}</td>
            <td>{{$row->expiration}}</td>
            <td>{{$row->amount}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
