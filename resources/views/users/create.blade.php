@extends('layouts.master')

@section('content')

 <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">{{ $judul }}</h4>
                                 @include('includes.flasherror')
                            </div>
                            <div class="content">
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/users') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-5">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="username" value="{{ old('username') }}">


                                        </div>
                                        <div class="col-md-3">
                                                <label>E-Mail Address</label>
                                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}">
                                        </div>
                                        <div class="col-md-4">
                                                <label for="exampleInputEmail1">Password</label>
                                                 <input id="password" type="password" class="form-control" name="password">
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                                <label>Confirmation Password</label>
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                        </div>
                                        <div class="col-md-6">
                                                <label>Role</label>
                                                <select name="role_id" class="form-control">
                                                <option value="">Pilih Akses</option>
                                                @foreach ($role as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                                </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                                <label>Avatar</label>
                                                <input type="file" id="avatar" name="avatar" class="form-control">
                                        </div>
                                    </div>


                                    <button type="reset" class="btn btn-default btn-fill pull-right">Reset</button>
                                    <button type="submit" class="btn btn-info btn-fill">Save</button>
                                    <a type="button" class="btn btn-primary" href="{{ url('users/') }}"> Back </a>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>

@endsection
