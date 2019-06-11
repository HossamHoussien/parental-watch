<div class="nanny-card my-3 p-3 bg-white" city="{{ strtolower($nanny->city) }}" age={{ $nanny->age }}
    gender="{{ $nanny->gender }}">
    <div class="profile">
        <div class="profile-img" style="background-image: url({{ avatar($nanny) }})"> </div>
        <a href="{{ route('parent.profile.nanny', $nanny->id) }}">
            <div class="name">{{ $nanny->name }}</div>
        </a>
        <div class="username"> <span>@</span>{{ $nanny->username }}</div>
        <div class="section mt-5">
            <ul>

                <li>
                    <i class="fas fa-birthday-cake"></i>
                    {{ $nanny->age() }}
                </li>

                <li>
                    <i class="fas fa-venus-mars"></i>
                    {{ $nanny->gender() }}
                </li>

                <li>
                    <i class="fas fa-phone-volume"></i>
                    {{ $nanny->phone }}
                </li>

                <li>
                    <i class="fas fa-map-marker-alt"></i>
                    {{ $nanny->address }}
                </li>

                <li>
                    <i class="fas fa-envelope-open-text"></i>
                    {{ $nanny->email }}
                </li>
            </ul>
        </div>



    </div>
</div>
