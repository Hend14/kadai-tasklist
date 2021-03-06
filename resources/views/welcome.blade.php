@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row mb-4">
            <aside class="col-sm-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ Auth::user()->name }}</h3>
                    </div>
                    <div class="card-body">
                        <img class="rounded img-fluid" src="{{ Gravatar::src(Auth::user()->email, 300) }}" alt="">
                    </div>
                </div>
            </aside>
        </div>
        {!! link_to_route('tasks.create', '新規タスクの追加', [], ['class' => 'btn btn-primary']) !!}
        @if (count($tasks) > 0)
            @include('tasks.index', ['tasks' => $tasks])
        @endif
    @else
    <div class="center jumbotron">
        <div class="text-center">
            <h1>Welcome to the Tasklist</h1>
            {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>
    @endif
@endsection
