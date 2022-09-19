@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <h2>New Truck</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('t_store')}}" method="post" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Maker</span>
                        <input value="{{old('maker')}}" type="text" name="maker" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Plate</span>
                        <input value="{{old('plate')}}" type="text" name="plate" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Make year</span>
                        <input value="{{old('make_year')}}" type="text" name="make_year" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Notices</span>
                        <textarea name="mechanic_notices" class="form-control">{{old('mechanic_notices')}}</textarea>
                    </div>
                    <select name="mechanic_id" class="form-select mt-3">
                        <option value="0">Choose mechanic</option>
                        @foreach ($mechanics as $value)
                        <option value="{{$value->id}}" @if($value->id == old('mechanic_id')) selected @endif>{{$value->name}} {{$value->surname}}</option>
                        @endforeach

                      </select>
                      <div class="input-group mt-3">
                        <span class="input-group-text">Upload photo</span>
                        <input type="file" name="photo" class="form-control">
                    </div>
                    @csrf
                    <button type="submit" class="btn btn-secondary mt-4">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection