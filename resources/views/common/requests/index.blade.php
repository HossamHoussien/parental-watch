@php
$type = currentUser()->guard;
@endphp
@extends($type . '.layouts.master')

@section('content')
<div class="posts-index">
    <div class="container">
        @foreach ($requests as $request)

        <li>{{ $request->from->name }}</li>

        @endforeach
    </div>

</div>
@endsection
