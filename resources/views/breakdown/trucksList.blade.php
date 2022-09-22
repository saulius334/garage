<select data-create name="truck_id" class="form-select mt-3">
    @foreach ($trucks as $truck)
    <option value="{{$truck->id}}">{{$truck->maker}} {{$truck->plate}}</option>
    @endforeach
</select>