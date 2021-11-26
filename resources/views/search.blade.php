@extends('base')

@section('title')
    This is Search Page
@endsection


@section('body')
    <div style="padding-top: 30px"/>
    <div class="row">
        <div class="col-sm-8 m-auto">
            <div class="card-header">
                Search Manager
            </div>

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

                    @foreach ($managers as $user)
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

    </div>

@endsection

@section('footertext')
    Developed By Shihab  <br>
@endsection

@section('sitename')
    <b>rightbrainsolution.com </b> <br>
@endsection
