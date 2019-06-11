@php
$type = currentUser()->guard;
@endphp
@extends($type . '.layouts.master')

@section('content')
<div class="posts-create">
    <div class="row mx-0 justify-content-around my-3">
        <div class="col-md-3 bg-white p-5">
            <h5 class="font-weight-bold">Warning!</h5>
            <p>Don't post your credit card information, password under any circumstances</p>
        </div>
        <div class="col-md-8 bg-white p-5">
            <form action="{{ route('posts.store') }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ currentUser()->id }}">
                <input type="hidden" name="user_type" value="{{ get_class(currentUser()) }}">

                <div class="form-group">
                    <label for="title" class="font-weight-bold">Post Title</label>
                    <input id="title" class="form-control" type="text" name="title">
                </div>

                <div class="form-group">
                    <label for="description" class="font-weight-bold">Post Description</label>
                    <input id="description" class="form-control" type="text" name="description">
                </div>

                <button type="submit" class="btn btn-success">Publish</button>

            </form>
        </div>
    </div>

</div>
@endsection
