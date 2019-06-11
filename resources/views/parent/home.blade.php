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
                <a href="{{ route('parent.posts.create') }}" class="btn btn-dark btn-lg">New Post</a>
            </div>
        </div>
    </div>
    <div class="container mt-5 mb-5 timeline">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h3 class="bold mb-4">Hiring Histroy</h3>
                <ul class="timeline">
                    @foreach ($parent->history->sortByDesc('created_at') as $history)
                    <li>
                        <a href="{{ route('parent.profile.'.$history->hired->guard, $history->hireable) }}">
                            <span>{{  $history->hired->name }}</span>
                            <span class="hired-username"><span>@</span>{{ $history->hired->username }}</span>

                        </a>
                        <span class="hire-date float-right"
                            title="{{ $history->created_at->todayDateTimeString() }}">{{ $history->created_at->diffForHumans() }}</span>
                        <p>You hired a <span class="bold">{{ $history->hired->guard }}</span> for your children</p>
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>


</div>
@endsection
