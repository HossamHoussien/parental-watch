@extends(currentGuard() . '.layouts.master')
@php
$user = currentUser();
@endphp
@section('content')
<div class="profile">


    <div class="container bg-white p-4 mt-3">
        <div class="row mx-0 p-5">

            <div class="w-100">
                <div class="row">
                    <div class="col-md-3 info">
                        <div class="avatar" style="background-image: url({{ avatar($user) }})"></div>
                        <div class="name text-center">
                            <p class="text-secondary"><span>@</span>{{ $user->username }}</p>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <form action="{{ route(currentGuard() . '.profile.update', $user->id) }}" method="post">
                            @csrf
                            <table class="table table-hover">
                                <tbody>


                                    <tr>
                                        <th scope="row">Name</th>
                                        <td>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $user->name }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ $user->email }}">
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Address</th>
                                        <td>
                                            <input type="text" class="form-control" name="address"
                                                value="{{ $user->address }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Gender</th>
                                        <td>
                                            <select class="custom-select" name="gender">
                                                <option value="m">Male</option>
                                                <option value="f">Female</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Age</th>
                                        <td>
                                            <select class="custom-select" name="age">
                                                @for ($i = 18; $i < 100; $i++) <!-- LINE -->
                                                    <option value="{{ $i }}" {{ $user->age == $i ? 'selected' : '' }}>
                                                        {{ $i }}
                                                    </option>

                                                    @endfor
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Phone</th>
                                        <td>
                                            <input type="text" class="form-control" name="phone"
                                                value="{{ $user->phone }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">About Me</th>
                                        <td>
                                            <textarea class="form-control" name="about"
                                                rows="3">{{ $user->about }}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Experience</th>
                                        <td>
                                            <textarea class="form-control" name="experience"
                                                rows="3">{{ $user->experience }}</textarea>

                                        </td>
                                    </tr>
                                    @auth('tutor')
                                    <tr>
                                        <th scope="row">Education</th>
                                        <td>
                                            <textarea class="form-control" name="education"
                                                rows="3">{{ $user->education }}</textarea>
                                        </td>
                                    </tr>
                                     <tr>
                                         <th scope="row">Subject</th>
                                         <td>
                                             <select class="custom-select" name="subject">

                                                 <option value="math" {{ $user->subject == 'math' ? 'selected' : '' }}>
                                                     Math</option>

                                                 <option value="arabic"
                                                     {{ $user->subject == 'arabic' ? 'selected' : '' }}>
                                                     Arabic</option>

                                                 <option value="english"
                                                     {{ $user->subject == 'english' ? 'selected' : '' }}>
                                                     English</option>

                                                 <option value="french"
                                                     {{ $user->subject == 'french' ? 'selected' : '' }}>
                                                     French</option>

                                                 <option value="italian"
                                                     {{ $user->subject == 'italian' ? 'selected' : '' }}>
                                                     Italian</option>

                                                 <option value="spanish"
                                                     {{ $user->subject == 'spanish' ? 'selected' : '' }}>
                                                     Spanish</option>

                                                 <option value="german"
                                                     {{ $user->subject == 'german' ? 'selected' : '' }}>
                                                     German</option>

                                                 <option value="science"
                                                     {{ $user->subject == 'science' ? 'selected' : '' }}>
                                                     Science</option>

                                                 <option value="biology"
                                                     {{ $user->subject == 'biology' ? 'selected' : '' }}>
                                                     Biology</option>

                                                 <option value="chemistry"
                                                     {{ $user->subject == 'chemistry' ? 'selected' : '' }}>
                                                     Chemistry</option>

                                                 <option value="physics"
                                                     {{ $user->subject == 'physics' ? 'selected' : '' }}>
                                                     Physics</option>

                                                 <option value="art" {{ $user->subject == 'art' ? 'selected' : '' }}>
                                                     Art</option>

                                                 <option value="music"
                                                     {{ $user->subject == 'music' ? 'selected' : '' }}>
                                                     Music</option>

                                                 <option value="social"
                                                     {{ $user->subject == 'social' ? 'selected' : '' }}>
                                                     Social Studies</option>

                                                 <option value="history"
                                                     {{ $user->subject == 'history' ? 'selected' : '' }}>
                                                     History</option>

                                             </select>
                                         </td>
                                     </tr>
                                    @endauth


                                   



                                </tbody>
                            </table>

                            <button type="submit" class="btn btn-success">Save Changes</button>
                        </form>

                    </div>
                </div>

            </div>


        </div>
    </div>
</div>
@endsection
