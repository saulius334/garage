@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>Trucks</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($trucks as $truck)
                        <li class="list-group-item">
                            <div class="trucks-list">
                                <div class="content">
                                    <h1><span>plate:</span>{{$truck->plate}}</h1>
                                    <h4><span>maker:</span>{{$truck->maker}}</h4>
                                    <h5><span>mechanic:</span>
                                        <a href="{{route('m_show', $truck->getMechanic->id)}}">
                                        {{$truck->getMechanic->name}} {{$truck->getMechanic->surname}}
                                    </a></h5>
                                </div>
                                <div class="buttons">
                                    <a href="{{route('t_show', $truck)}}" class="btn btn-info">Show</a>
                                    <a href="{{route('t_edit', $truck)}}" type="button" class="btn btn-success">Edit</a>
                                    <form action="{{route('t_delete', $truck)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">No trucks found</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection