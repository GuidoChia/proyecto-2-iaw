<select class="form-control" name="reactive-input">
    @if(isset($existent_reactives))
    @foreach($existent_reactives as $existent_reactive)
    <option>{{$existent_reactive->name}}</option>
    @endforeach
    @endif
</select>
