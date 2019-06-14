@extends('tutor.layouts.master')
@php
$tutor = currentUser();
@endphp
@section('content')
<div class="home">


    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="stats d-flex justify-content-center mt-3">
                <div class="card text-white text-center bg-dark mb-3 mx-2" style="max-width: 18rem;width: 200px;">
                    <div class="card-body">
                        <h1 class="card-title">{{ $tutor->hiringCount() }}</h1>
                    </div>
                    <div class="card-header">
                        <h4>Hiring Count</h4>
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
                    @foreach ($tutor->requests->sortByDesc('created_at') as $request)
                    <li class="pending">
                        <span class="hire-date float-right"
                            title="{{ $request->created_at->todayDateTimeString() }}">{{ $request->created_at->diffForHumans() }}</span>
                        <p>
                            <a href="#" class="bold">
                                <span>{{  $request->from->name }}</span>
                            </a>
                            <span> requested your services</span>
                        </p>
                        <div>
                            <button class="btn btn-success btn-sm"
                                onclick="window.location.assign('{{ route('tutor.requests.accept', $request->id) }}')">Accpet</button>
                            <button class="btn btn-danger btn-sm"
                                onclick="window.location.assign('{{ route('tutor.requests.decline', $request->id) }}')">Decline</button>
                        </div>
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
                    @foreach ($tutor->history->sortByDesc('created_at') as $history)
                    <li class="{{ $history->status ? ' accepted' : 'declined'}}">
                        <span class="hire-date float-right"
                            title="{{ $history->created_at->todayDateTimeString() }}">{{ $history->created_at->diffForHumans() }}</span>
                        <p>You {{ $history->status ? 'approved' : 'declined' }}
                            <span class="bold">
                                <a href="#">{{  $history->sender->name }}</a>
                            </span>
                            <span>'s request</span>
                        </p>
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>


</div>
@endsection
