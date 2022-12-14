@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Truck</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('t_update', $truck)}}" method="post" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Maker</span>
                        <input value="{{old('maker', $truck->maker)}}" type="text" name="maker" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Plate</span>
                        <input value="{{old('plate', $truck->plate)}}" type="text" name="plate" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Make year</span>
                        <input value="{{old('make_year', $truck->make_year)}}" type="text" name="make_year" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Notices</span>
                        <textarea name="mechanic_notices" class="form-control">{{old('mechanic_notices', $truck->mechanic_notices)}}</textarea>
                    </div>
                    @if($truck->photo)
                        <div class="img-small mt-3">
                            <img src="{{$truck->photo}}">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="del-photo" name="delete_photo">
                                <label class="form-check-label" for="del-photo">
                                    Delete photo
                                </label>
                            </div>
                        </div>
                        @endif
                        <div class="input-group mt-3">
                            <span class="input-group-text">Photo</span>
                            <input type="file" name="photo" class="form-control">
                        </div>
                    <select name="mechanic_id" class="form-select mt-3">
                        <option value="0">Choose mechanic</option>
                        @foreach ($mechanics as $value)
                        <option value="{{$value->id}}" @if ($value->id == old($value->id, $truck->mechanic_id)) selected @endif>{{$value->name}} {{$value->surname}}</option>
                        @endforeach

                      </select>
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-secondary mt-4">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection