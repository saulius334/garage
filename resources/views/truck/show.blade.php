@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>Truck</h2>
                </div>
                <div class="card-body">
                    <div class="truck-show">
                    <div class="line"><small>Plate:</small><h5>{{$truck->plate}}</h5></div>
                    <div class="line"><small>Truck:</small><h5>{{$truck->maker}} {{$truck->make_year}}</h5></div>
                    <div class="line"><small>Mechanic:</small><h5>{{$truck->getMechanic->name}} {{$truck->getMechanic->surname}}</h5></div>
                    @if($truck->photo)
                    <div class="img">
                        <img src="{{$truck->photo}}" alt="photo">
                    </div>
                    @endif
                    <p>{{$truck->mechanic_notices}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection