@extends('parent.layouts.master')
@php
$parent = currentUser();
@endphp
@section('content')
<div class="home">


    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="stats d-flex justify-content-center mt-3">
                <div class="card text-white text-center bg-dark mb-3 mx-2" style="max-width: 18rem;width: 200px;">
                    <div class="card-body">
                        <h1 class="card-title">{{ $parent->nanniesHiringCount() }}</h1>
                    </div>
                    <div class="card-header">
                        <h4>Nannies Hired</h4>
                    </div>
                </div>

                <div class="card text-white text-center bg-dark mb-3 mx-2" style="max-width: 18rem;width: 200px;">
                    <div class="card-body">
                        <h1 class="card-title">{{ $parent->tutorsHiringCount() }}</h1>
                    </div>
                    <div class="card-header">
                        <h4>Tutors Hired</h4>
                    </div>
                </div>

            </div>

            <div class="hire-now text-center mt-5">
                <a href="{{ route('posts.create') }}" class="btn btn-dark btn-lg">New Post</a>
            </div>
        </div>
    </div>


    <div class="container mt-5 mb-5 timeline">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h3 class="bold mb-4">Pending Requests <span class="help-text">Waiting approval</span></h3>
                <ul class="timeline">
                    @foreach ($parent->requests->sortByDesc('created_at') as $request)
                    <li class="pending">
                        <span class="hire-date float-right"
                            title="{{ $request->created_at->todayDateTimeString() }}">{{ $request->created_at->diffForHumans() }}</span>
                        @if ($request->to->guard == 'parent')
                        <p>
                            <span class="bold">
                                <a href="{{ route('parent.profile.'.$request->from->guard, $request->from_id) }}">
                                    <span>{{  $request->from->name }}</span>
                                </a>
                            </span>
                            <span> offers {{ $request->from->gender == 'm' ? 'his' : 'her' }} services.</span>
                        </p>
                        <div>
                            <button class="btn btn-success btn-sm"
                                onclick="window.location.assign('{{ route('parent.requests.accept', $request->id) }}')">Accpet</button>
                            <button class="btn btn-danger btn-sm"
                                onclick="window.location.assign('{{ route('parent.requests.decline', $request->id) }}')">Decline</button>
                        </div>
                        @else
                        <p>You requested
                            <span class="bold">
                                <a href="{{ route('parent.profile.'.$request->to->guard, $request->to_id) }}">
                                    <span>{{  $request->to->name }}</span>
                                </a>
                            </span>
                            <span>'s services</span>
                        </p>
                        @endif

                    </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>


    <div class="container mt-5 mb-5 timeline">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h3 class="bold mb-4">Hiring Histroy</h3>
                <ul class="timeline">
                    @foreach ($parent->history->sortByDesc('created_at') as $history)
                    <li class="{{ $history->status ? ' accepted' : 'declined'}}">
                        <span class="hire-date float-right"
                            title="{{ $history->created_at->todayDateTimeString() }}">{{ $history->created_at->diffForHumans() }}</span>

                        @if ($history->by_parent)
                        <p>You {{ $history->status ? ' accepted' : 'declined'}}
                            <span class="bold">
                                <a href="{{ route('parent.profile.'.$history->hired->guard, $history->hireable) }}">
                                    <span>{{  $history->hired->name }}</span>
                                </a>
                            </span>
                            <span>'s request</span>
                        </p>
                        @else
                        <p>
                            <span class="bold">
                                <a href="{{ route('parent.profile.'.$history->hired->guard, $history->hireable) }}">
                                    <span>{{  $history->hired->name }}</span>
                                </a>
                            </span>
                            <span> {{ $history->status ? ' accepted' : 'declined'}} your request</span>
                        </p>
                        @endif

                    </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>


</div>
@endsection
