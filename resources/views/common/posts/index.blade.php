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
                    @if (currentUser()->hasRequest($post->owner))
                    <button class="btn btn-success">Request Sent</button>

                    @else
                    <button
                        url="{{ route('parent.requests.store') }}?to_id={{ $post->owner->id }}&to_type={{ get_class($post->owner) }}"
                        class="btn btn-primary" onclick="requestSent(this)">Request Services</button>
                    @endif

                </div>
                @endif

                @if ($type == 'nanny'
                && !currentUser()->is($post->owner)
                && $post->owner->guard == 'parent'
                )
                <div class="posted-by">
                    @if (currentUser()->hasRequest($post->owner))
                    <button class="btn btn-success">Applied</button>

                    @else
                    <button
                        url="{{ route('nanny.requests.apply') }}?to_id={{ $post->owner->id }}&to_type={{ get_class($post->owner) }}"
                        class="btn btn-primary" onclick="apply(this)">Apply</button>
                </div>
                @endif
                @endif

                @if ($type == 'tutor'
                && !currentUser()->is($post->owner)
                && $post->owner->guard == 'parent'
                )
                <div class="posted-by">
                    @if (currentUser()->hasRequest($post->owner))
                    <button class="btn btn-success">Applied</button>

                    @else
                    <button
                        url="{{ route('tutor.requests.apply') }}?to_id={{ $post->owner->id }}&to_type={{ get_class($post->owner) }}"
                        class="btn btn-primary" onclick="apply(this)">Apply</button>
                </div>
                @endif
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

@push('js')
<script>
    function requestSent(el) {
        if ($(el).hasClass('btn-primary')) {
            axios.post($(el).attr('url')).then((response) => {
                $(el).text('Request Sent');
                $(el).toggleClass('btn-primary btn-success');
            });
        }

    }

    function apply(el) {
        if ($(el).hasClass('btn-primary')) {
            axios.get($(el).attr('url')).then((response) => {
                $(el).text('Applied');
                $(el).toggleClass('btn-primary btn-success');
            });
        }

    }

</script>
@endpush
