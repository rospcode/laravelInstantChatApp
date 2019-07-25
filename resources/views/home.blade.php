@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7 col-md-offset-3">
          <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<div class="container">
    <div class="row">
        <div class="col-md-5">
          <div class="list-group">
@foreach($user as $users)
<a href="/chat/{{$users->id}}" class="list-group-item list-group-item-action">{{ $users->name }}</a>
@endforeach
</div>
        </div>
    </div>
</div>

        </div>
    </div>
</div>
@endsection
