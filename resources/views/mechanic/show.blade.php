@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <h2>Post</h2>
                </div>
                <div class="card-body">
                    <h5>{{$mechanic->name}}</h5>
                    <h5>{{$mechanic->surname}}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection