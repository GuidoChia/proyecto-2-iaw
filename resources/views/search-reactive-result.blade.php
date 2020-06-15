<div class="container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Reactive</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reactives as $reactive)
        <tr>
            <td>{{$reactive->name}}</td>
            <td>{{$reactive->description}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
