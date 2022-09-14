@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <h2>New Mechanic</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('m_store')}}" method="post">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Name</span>
                        <input value="{{old('name')}}" type="text" name="name" class="form-control">
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">Surname</span>
                        <input value="{{old('surname')}}" type="text" name="surname" class="form-control">
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