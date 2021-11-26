@extends('base')

@section('title')
    This is Crud Page
@endsection


@section('body')
    <div style="padding-top: 30px"/>
    <div class="row">
        <div class="col-sm-8">
            <div class="card-header">
                All Manager
            </div>
            @if(session('update'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong> {{session('update')}} </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(session('delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong> {{session('delete')}} </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Token</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>

                    @php
                    $serial =1;
                    @endphp

                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $serial ++ }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->admin_unique_token }}</td>
                            <td>
                                <a href="{{ url('manager/edit/'. $user->id ) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ url('manager/delete/'. $user->id ) }}" onclick=" return confirm('Are you want to delete')" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    Add New Manager
                </div>
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong> {{session('success')}} </strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card-body">

                    <form action="{{ url('manager/create') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" placeholder="Username">

                            @error('username')
                            <strong class="text-danger">{{$message}}</strong>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" placeholder="Email">
                            @error('email')
                            <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" placeholder="Phone">
                            @error('phone')
                            <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1"
                                   placeholder="Password">
                            @error('password')
                            <strong class="text-danger">{{$message}}</strong>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Token</label>
                            <input type="text" name="token" class="form-control @error('token') is-invalid @enderror" id="exampleInputPassword1"
                                   placeholder="Token">
                            @error('token')
                            <strong class="text-danger">{{$message}}</strong>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Manager</label>

                            <select name="previsoumanager" id="" class="form-control farmer_purpose">
                                <option selected disabled value="">Select Manager</option>

                                @foreach ($users as $user)
                                    <option value={{$user->id}}> {{ $user->username }} </option>
                                @endforeach

                              {{--  <option value="5"> Performance Report </option>
                                <option value="11"> Agent Service </option>
                                <option value="12"> Survey </option>
                                <option value="13"> Problem Farm Visit </option>--}}
                            </select>

                        </div>

                        {{--    <div class="form-group position-relative has-icon-left mb-2">
                                <fieldset class="form-group">
                                    <select class="form-select" name="role_name" id="role_name">
                                        <option selected disabled>Select Role Name</option>
                                        <option value="admin">Admin</option>
                                        <option value="superadmin">Super Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                    <div class="form-control-icon">
                                        <i class="bi bi-exclube"></i>
                                    </div>
                                </fieldset>

                            </div>--}}



                        <div class="form-check">
                            <input type="checkbox" name="checkmeal" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check Meal Status</label>
                        </div>

                        <div style="margin-top: 10px"/>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('footertext')
    Developed By Shihab  <br>
@endsection

@section('sitename')
    <b>rightbrainsolution.com </b> <br>
@endsection
