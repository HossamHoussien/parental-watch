@extends('parent.layouts.master')
@php
$parent = currentUser();
@endphp
@section('content')
<div class="profile">


    <div class="container bg-white p-4 mt-3">
        <div class="row mx-0 p-5">

            <div class="w-100">
                <div class="row">
                    <div class="col-md-3 info">
                        <div class="avatar" style="background-image: url({{ avatar($parent) }})"></div>
                        <div class="name text-center">
                            <p class="text-secondary"><span>@</span>{{ $parent->username }}</p>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <form action="{{ route('parent.profile.update') }}" method="post">
                            @csrf
                            <table class="table table-hover">
                                <tbody>


                                    <tr>
                                        <th scope="row">Name</th>
                                        <td>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $parent->name }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ $parent->email }}">
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Address</th>
                                        <td>
                                            <input type="text" class="form-control" name="address"
                                                value="{{ $parent->address }}">
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
                                                    <option value="{{ $i }}" {{ $parent->age == $i ? 'selected' : '' }}>
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
                                                value="{{ $parent->phone }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">About Me</th>
                                        <td>
                                            <textarea class="form-control" name="about"
                                                rows="3">{{ $parent->about }}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">SSN</th>
                                        <td>
                                            <input type="text" class="form-control" name="ssn"
                                                value="{{ $parent->ssn }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Bank Account</th>
                                        <td>
                                            <input type="text" class="form-control" name="bank_account"
                                                value="{{ $parent->bank_account }}">
                                        </td>
                                    </tr>

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
