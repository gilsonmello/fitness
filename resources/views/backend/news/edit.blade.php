@extends('layouts.backend.app')

@section('content')
<div class="container">
    @can('edit_news', $news)
        <h1>{{$news->title}}</h1>
        <p>{{$news->description}}</p>
    @endcan
    <hr>
</div>
@endsection
