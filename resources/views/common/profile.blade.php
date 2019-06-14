@extends(currentGuard() . '.layouts.master')

@section('content')

<div class="container">
    @if(session('status'))
    <div class="alert alert-success m-3">
        {{ session('status') }}
    </div>
    @endif
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic text-center">
                    <img src="{{ avatar($user) }}" class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        {{ $user->name }}
                    </div>
                    <div class="profile-usertitle-job">
                        <span>@</span>{{ $user->username }}
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                    <span title="Likes">
                        <i class="fas fa-thumbs-up mx-1"></i>
                        {{ $user->likes }}
                    </span>

                    <span title="Dislikes">
                        <i class="fas fa-thumbs-down mx-1"></i>
                        {{ $user->dislikes }}
                    </span>

                    <span title="Hiring Count">
                        <i class="fas fa-stopwatch mx-1"></i>
                        {{ $user->hiringCount() }}
                    </span>

                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li>
                            <i class="fas fa-birthday-cake"></i>
                            <span>
                                {{ $user->age() }}
                            </span>
                        </li>

                        <li>
                            <i class="fas fa-venus-mars"></i>
                            <span>
                                {{ $user->gender() }}
                            </span>
                        </li>

                        <li>
                            <i class="fas fa-phone-volume"></i>
                            <span>
                                {{ $user->phone }}
                            </span>
                        </li>

                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>
                                {{ $user->address }}
                            </span>
                        </li>

                        <li>
                            <i class="fas fa-envelope-open-text"></i>
                            <span>
                                {{ $user->email }}
                            </span>
                        </li>

                    </ul>
                </div>
                @auth('nanny')

                <div class="mt-5 mx-3">
                    <a href="{{ route('nanny.profile.edit', $user->id) }}"
                        class="btn btn-primary btn-block mb-3">Edit</a>
                </div>
                <div class="mx-3">
                    <form action="{{ route('nanny.profile.delete', $user->id)  }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-block mb-3">Delete Account</button>
                    </form>
                </div>
                @endauth
                @auth('tutor')

                <div class="mt-5 mx-3">
                    <a href="{{ route('tutor.profile.edit', $user->id) }}"
                        class="btn btn-primary btn-block mb-3">Edit</a>
                </div>
                <div class="mx-3">
                    <form action="{{ route('tutor.profile.delete', $user->id)  }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-block mb-3">Delete Account</button>
                    </form>
                </div>
                @endauth
                <!-- END MENU -->
            </div>


        </div>
        <div class="col-md-9 position-relative">
            @auth('parent')
            <form action="{{ route('parent.hire') }}" method="post" id="hire-form">
                @csrf
                <input type="hidden" name="type" value="{{ $user->class_name }}">
                <input type="hidden" name="hireable_id" value="{{ $user->id }}">
            </form>
            <button type="submit" class="btn btn-primary hire-me position-absolute" data-toggle="modal"
                data-target="#exampleModal">Hire Me</button>
            @endauth

            <div class="profile-content">
                <div id="overview">
                    <div class="section">
                        <label for="">About Me</label>
                        <div class="content">
                            <p>{{ $user->about }}</p>
                        </div>
                    </div>

                    <div class="see-more">
                        @if($user->education)
                        <div class="section">
                            <label for="">Education</label>
                            <div class="content">
                                <p>{{ $user->education }}</p>
                            </div>
                        </div>
                        @endif
                        @if($user->subject)
                        <div class="section">
                            <label for="">Subject</label>
                            <div class="content">
                                <p>{{ ucfirst($user->subject) }}</p>
                            </div>
                        </div>
                        @endif
                        <div class="section">
                            <label for="">Experience</label>
                            <div class="content">
                                <p>{{ $user->experience }}</p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Hire Process</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="$('#hire-form').submit()">Confirm</button>
            </div>
        </div>
    </div>
</div>
@endsection


@push('css')
<link rel="stylesheet" href="{{ asset('css/nanny/profile.css') }}">
@endpush
