<div class="container">
    <table class="table table-striped animated fadeIn">
        <thead>
        <tr>
            <th>Reactive</th>
            <th>Description</th>
            @if(isset($imagePath))
            <th>Barcode</th>
            @endif
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$reactive->name}}</td>
            <td>{{$reactive->description}}</td>
            @if(isset($imagePath))
            <td><a href="{{$imagePath}}" target="_blank">See barcode</a></td>
            @endif
        </tr>
        </tbody>
    </table>
</div>
