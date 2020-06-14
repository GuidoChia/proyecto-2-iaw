<div class="container">
    <p> The Search results for your query <b> {{ $query ?? '' }} </b> are :</p>
    <h2>Reactive details</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Reactive</th>
            <th>Stock</th>
            <th>Expiration</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reactives as $reactive)
        @foreach($stocks->slice($loop->index, 1)->first() as $stock)
        <tr>
            <td>{{$reactive->name}}</td>
            <td>{{$stock->amount}}</td>
            <td>{{$stock->expiration}}</td>
        </tr>
        @endforeach
        @endforeach
        </tbody>
    </table>
</div>
