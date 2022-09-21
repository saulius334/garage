@extends('layouts.app')
@section('content')
<div class="container --content">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>Truck</h2>
                    <form action="{{route('t_index')}}" method="get">
                        <div class="container">
                            <div class="row">
                                <div class="col-5">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-6">
                                                <select name="mech" class="form-select mt-1">
                                                    <option value="0">All</option>
                                                    @foreach($mechanics as $mechanic)
                                                    <option value="{{$mechanic->id}}" @if($mech==$mechanic->id) selected @endif>{{$mechanic->name}} {{$mechanic->surname}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-6">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="input-group mb-3">
                                                    <input type="text" name="s" class="form-control" value="{{$s}}">
                                                <button type="submit" class="input-group-text">Search</button>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <a href="{{route('t_index')}}" class="btn btn-secondary">Reset</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($trucks as $truck)
                        <li class="list-group-item">
                            <div class="trucks-list">
                                <div class="content">
                                    <h2><span>plate: </span>{{$truck->plate}}</h2>
                                    <h4><span>maker: </span>{{$truck->maker}}</h4>
                                    <h5>
                                        <span>mechanic: </span>
                                        <a href="{{route('m_show', $truck->getMechanic->id)}}">
                                            {{$truck->getMechanic->name}} {{$truck->getMechanic->surname}}
                                        </a></h5>
                                    @if($truck->photo)
                                    <h5><a href="{{$truck->photo}}" target="_BLANK">Photo</a></h5>
                                    @endif
                                </div>
                                <div class="buttons">
                                    <a href="{{route('t_show', $truck)}}" class="btn btn-info">Show</a>
                                    <a href="{{route('t_edit', $truck)}}" class="btn btn-success">Edit</a>
                                    <form action="{{route('t_delete', $truck)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">No trucks found</li>
                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="me-3 mx-3">
                {{ $trucks->links() }}
            </div>
        </div>
    </div>
</div>
@endsection