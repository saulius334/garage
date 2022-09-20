@extends('layouts.app')

@section('content')
<div class="container --content">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>Mechanics</h2>
                    <form action="{{route('m_index')}}" method="get">
                        <div class="container">
                            <div class="row">
                                <div class="col-5">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <select name="sort" class="form-select mt-1">
                                                    <option value="name_asc" @if('name_asc'==$sortSelect) selected @endif>Name AZ</option>
                                                    <option value="name_desc" @if('name_desc'==$sortSelect) selected @endif>Name ZA</option>
                                                    <option value="surname_asc" @if('surname_asc'==$sortSelect) selected @endif>Surname AZ</option>
                                                    <option value="surname_desc" @if('surname_desc'==$sortSelect) selected @endif>Surname ZA</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                {{-- <button type="submit" class="btn btn-primary m-1">Sort</button> --}}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-8">
                                                <select name="per_page" class="form-select mt-1">
                                                    <option value="all" @if('all'==$perPage) selected @endif>All</option>
                                                    <option value="5" @if('5'==$perPage) selected @endif>5</option>
                                                    <option value="10" @if('10'==$perPage) selected @endif>10</option>
                                                    <option value="20" @if('20'==$perPage) selected @endif>20</option>
                                                    <option value="50" @if('50'==$perPage) selected @endif>50</option>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                {{-- <button type="submit" class="btn btn-primary m-1">results in page</button> --}}
                                                <a href="{{route('m_index')}}" class="btn btn-secondary m-1">Reset</a>
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
                        @forelse($mechanics as $mechanic)
                        <li class="list-group-item">
                            <div class="mechanics-list">
                                <div class="content">
                                    <h2>{{$mechanic->name}}</h2>
                                    <h2>{{$mechanic->surname}}</h2>
                                    <span>[{{$mechanic->getTrucks()->count()}}]</span>
                                </div>
                                <div class="buttons">
                                    <a href="{{route('m_show', $mechanic)}}" class="btn btn-info">Show</a>
                                    <a href="{{route('m_edit', $mechanic)}}" class="btn btn-success">Edit</a>
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
                <div class="me-3 mx-3">
                    {{ $mechanics->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection