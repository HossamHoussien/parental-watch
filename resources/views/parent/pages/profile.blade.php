@extends('parent.layouts.master')
@php
$parent = currentUser();
@endphp
@section('content')
<div class="profile">
    <div class="container bg-white p-4 mt-3">
        @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <div class="row mx-0">
            <div class="process">
                <div class="process-row nav nav-tabs">
                    <div class="process-step">
                        <button type="button" class="btn btn-info btn-circle" data-toggle="tab" href="#menu1">
                            <i class="fa fa-info fa-2x"></i>
                        </button>
                        <p><small>Information</small></p>
                    </div>

                    <div class="process-step">
                        <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu2">
                            <i class="fas fa-child fa-2x"></i>
                        </button>
                        <p><small>Children</small></p>
                    </div>

                    <div class="process-step">
                        <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu3">
                            <i class="fas fa-cogs fa-2x" style="margin-left: -4px;"></i>
                        </button>
                        <p><small>Settings</small></p>
                    </div>


                </div>
            </div>
            <div class="tab-content w-100 mt-5">
                <div id="menu1" class="tab-pane fade active show">
                    <div class="row">
                        <div class="col-md-3 info">
                            <div class="avatar" style="background-image: url({{ avatar($parent) }})"></div>
                            <div class="name text-center">
                                <p class="bold mt-2 mb-0">{{ $parent->name }}</p>
                                <p class="text-secondary"><span>@</span>{{ $parent->username }}</p>
                            </div>
                            <div class="mt-5">
                                <a href="{{ route('parent.profile.edit') }}" class="btn btn-primary btn-block">Edit</a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <table class="table table-hover">
                                <tbody>


                                    <tr>
                                        <th scope="row">Email</th>
                                        <td>{{ $parent->email }}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Address</th>
                                        <td>{{ $parent->address }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Gender</th>
                                        <td>{{ $parent->gender() }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Age</th>
                                        <td>{{ $parent->age() }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Phone</th>
                                        <td>{{ $parent->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">About Me</th>
                                        <td>{{ $parent->about }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">SSN</th>
                                        <td>{{ $parent->ssn }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Bank Account</th>
                                        <td>{{ $parent->bank_account }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div id="menu2" class="tab-pane fade">
                    <div class="card-deck">
                        @if (count($parent->children))


                        @foreach($parent->children as $child)
                        <div class="card" style="max-width: 250px">
                            <div class="card-body">
                                <h5 class="card-title bold">{{ $child->name }}</h5>
                                <ul class="card-text list-unstyled">
                                    <li><i class="fas fa-calendar-week mr-2 text-center"
                                            style="width:15px"></i>{{ $child->age() }}
                                    </li>
                                    <li><i class="fas fa-venus-mars mr-2 text-center"
                                            style="width:15px"></i>{{ $child->gender() }}
                                    </li>
                                    <li><i class="fas fa-wheelchair mr-2 text-center"
                                            style="width:15px"></i>{{ $child->has_disability() }}</li>
                                </ul>
                            </div>

                        </div>
                        @endforeach
                        @else
                        <p class="w-100 text-center text-secondary">You have not added any children information yet.</p>
                        @endif
                    </div>
                    <div class="add-child mt-5">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#addChildModal">Add Child</button>
                    </div>

                </div>
                <div id="menu3" class="tab-pane fade">
                    <form action="{{ route('parent.profile.delete', $parent->id) }}" method="post"
                        class="border border-danger p-0">
                        @csrf
                        @method('DELETE')
                        <h3 class="text-white p-3 bg-danger">Delete this account permanently</h3>
                        <p class="p-3">Once you delete your account, you will not be able to undo this action and all
                            your
                            information will be erased from our system including your histroy and information.</p>

                        <button type="submit" class="btn btn-danger m-3">Confirm and delete account</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addChildModal" tabindex="-1" role="dialog" aria-labelledby="addChildModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('parent.children.add') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addChildModal">Child Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <small class="text-danger text-center w-100 d-block mb-3">Only you can see this information. No one
                        else
                        can access your children information.</small>
                    <div class="form-group">
                        <label for="name" class="bold">Child Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="age" class="bold">Child Age</label>
                        <input type="text" class="form-control" name="age" id="age">
                    </div>
                    <div class="form-group">
                        <label for="gender" class="bold">Child Gender</label>
                        <select name="gender" id="gender" class="custom-select">
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="has_disability" class="bold">Has disabilities?</label>
                        <select name="has_disability" id="has_disability" class="custom-select">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(function () {


        $('.process-step').on('click', function (e) {
            e.preventDefault();

            var $activeTab = $('.tab-pane.active');

            let $targetTab = $(`.tab-pane${$(this).find('button').attr('href')}`);

            console.log(`.tab-pane${$(this).find('button').attr('href')}`);

            $activeTab.removeClass('active show')
            $targetTab.addClass('active show')

            $('.btn-circle.btn-info').addClass('btn-default');
            $('.btn-circle.btn-info').removeClass('btn-info');

            $(this).find('button').removeClass('btn-default');
            $(this).find('button').addClass('btn-info');


        });
    });

</script>
@endpush
