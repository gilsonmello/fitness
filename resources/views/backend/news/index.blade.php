@extends('layouts.backend.app')

@section('content')
<div class="container">
        @forelse($notices as $notice)
            @can('view_news', $notice)
                <h1>{{$notice->title}}</h1>
                <p>{{$notice->description}}</p>
            @endcan
            <hr>
        @empty
            <p>Nenhuma notícia cadastrada</p>
        @endforelse
</div>
@endsection
