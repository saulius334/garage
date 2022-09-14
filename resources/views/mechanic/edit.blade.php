@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <h2>Change mechanic</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('m_edit', $mechanic)}}" method="post">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Name</span>
                        <input type="text" value={{old('name', $mechanic->name)}} name="name" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Surname</span>
                        <input type="text" value={{old('surname', $mechanic->surname)}} name="surname" class="form-control">
                    </div>
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-secondary mt-4">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection