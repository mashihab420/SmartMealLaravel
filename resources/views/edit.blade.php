@extends('base')

@section('title')
    This is Crud Page
@endsection


@section('body')
    <div style="padding-top: 30px"/>
    <div class="row">

        <div class="col-sm-8 m-auto">
            <div class="card">
                <div class="card-header">
                    Update Manager
                </div>

                <div class="card-body">

                    <form action="{{ url('manager/update/'.$users->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" value="{{$users->username}}">

                            @error('username')
                            <strong class="text-danger">{{$message}}</strong>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" value="{{$users->email}}">
                            @error('email')
                            <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" value="{{$users->phone}}">
                            @error('phone')
                            <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Token</label>
                            <input type="text" name="token" class="form-control @error('token') is-invalid @enderror" id="exampleInputPassword1"
                                   value="{{$users->admin_unique_token}}">
                            @error('token')
                            <strong class="text-danger">{{$message}}</strong>
                            @enderror

                        </div>

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
