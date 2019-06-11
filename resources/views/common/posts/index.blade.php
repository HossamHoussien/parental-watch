@php
$type = currentUser()->guard;
@endphp
@extends($type . '.layouts.master')

@section('content')
<div class="posts-index">
    <div class="container">
        <a href="{{ route('posts.create') }}" class="btn btn-dark my-3">Create Post</a>
        @foreach ($posts as $post)
        <div class="post card my-3">
            <h5 class="card-header">
                <span class="name mb-2">{{ $post->owner->name }}</span>
                <p class="mb-0">
                    {{ $post->title }}
                </p>

                @if ($type == 'parent'
                && !currentUser()->is($post->owner)
                && !str_contains(strtolower($post->user_type),
                $type) )
                <div class="posted-by">
                    <a href="{{ route('parent.requests.store') }}?to_id={{ $post->owner->id }}&to_type={{ get_class($post->owner) }}"
                        class="btn btn-primary">Request Services</a>
                </div>
                @endif

                @if ($type == 'nanny'
                && !currentUser()->is($post->owner)
                && !str_contains(strtolower($post->user_type),
                $type) )
                <div class="posted-by">
                    <button class="btn btn-primary">Apply</button>
                </div>
                @endif

                @if ($type == 'tutor'
                && !currentUser()->is($post->owner)
                && !str_contains(strtolower($post->user_type),
                $type) )
                <div class="posted-by">
                    <button class="btn btn-primary">Apply</button>
                </div>
                @endif

            </h5>
            <div class="card-body">
                <p class="card-text">{{ $post->content }}</p>
            </div>

        </div>

        @endforeach

    </div>

</div>
@endsection
