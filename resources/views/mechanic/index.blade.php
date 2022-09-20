@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Mechanics</h2>
                    <form action="{{route('m_index')}}" method="GET">
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                    <select name="sort" class="form-select mt-1">
                        <option value="name_asc" @if('name_asc' == $sortSelect) selected @endif>Name A-Z</option>
                        <option value="name_desc" @if('name_desc' == $sortSelect) selected @endif>Name Z-A</option>
                        <option value="surname_asc" @if('surname_asc' == $sortSelect) selected @endif>Surname A-Z</option>
                        <option value="surname_desc" @if('surname_desc' == $sortSelect) selected @endif>Surame Z-A</option>

                      </select>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary m-3">Sort</button>
                                <a href="{{route('m_index')}}" class="btn btn-secondary m-3">Reset</a>

                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($mechanics as $mechanic)
                        <li class="list-group-item">
                            <div class="mechanic-list">
                                <div class="content">
                                    <h2>{{$mechanic->name}}</h2>
                                    <h2>{{$mechanic->surname}}</h2>
                                    <span>[{{$mechanic->getTrucks()->count()}}]</span>
                                </div>
                                <div class="buttons">
                                    <a href="{{route('m_show', $mechanic)}}" class="btn btn-info">Show</a>
                                    <a href="{{route('m_edit', $mechanic)}}" type="button" class="btn btn-success">Edit</a>
                                    <form action="{{route('m_delete', $mechanic)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">No mechanics found</li>
                        @endforelse
                    </ul>
                </div>
                <div class="me-2 mx-3">
                    {{$mechanics->links()}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection