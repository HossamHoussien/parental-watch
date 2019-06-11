<div class="tutor-card my-3 p-3 bg-white" city="{{ strtolower($tutor->city) }}" age={{ $tutor->age }}
    gender="{{ $tutor->gender }}">
    <div class="profile">
        <div class="profile-img" style="background-image: url({{ $tutor->avatar }})"> </div>
        <div class="section">
            <ul>

                <li>
                    <i class="fas fa-birthday-cake"></i>
                    {{ $tutor->age() }}
                </li>

                <li>
                    <i class="fas fa-venus-mars"></i>
                    {{ $tutor->gender() }}
                </li>

                <li>
                    <i class="fas fa-phone-volume"></i>
                    {{ $tutor->phone }}
                </li>

                <li>
                    <i class="fas fa-map-marker-alt"></i>
                    {{ $tutor->address }}
                </li>

                <li>
                    <i class="fas fa-envelope-open-text"></i>
                    {{ $tutor->email }}
                </li>
            </ul>
        </div>



    </div>

    <div class="data">
        <div class="card m-0">

            <div class="card-header">
                <a href="{{ route('parent.profile.tutor', $tutor->id) }}">
                    <span class="name">{{ $tutor->name }}</span>
                    <span class="username ml-1"> <span>@</span>{{ $tutor->username }}</span>
                </a>
            </div>
            <div class="card-body">
                <div class="section">
                    <label for="">About Me</label>
                    <div class="content">
                        <p>{{ $tutor->about }}</p>
                    </div>
                </div>

                <div class="see-more">
                    <div class="section">
                        <label for="">Education</label>
                        <div class="content">
                            <p>{{ $tutor->education }}</p>
                        </div>
                    </div>

                    <div class="section">
                        <label for="">Experience</label>
                        <div class="content">
                            <p>{{ $tutor->experience }}</p>
                        </div>
                    </div>


                </div>



            </div>
        </div>

    </div>
</div>
