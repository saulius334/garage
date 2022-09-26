@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            @include('breakdown.create')
        </div>
        <div class="col-7 " id="breakdowns-list">
            list
        </div>
    </div>
</div>
@include('breakdown.modal')
@endsection