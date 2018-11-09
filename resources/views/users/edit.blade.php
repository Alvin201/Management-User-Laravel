@extends('layouts.master')

@section('content')

 <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">{{ $judul }}</h4>
                                 @include('includes.flasherror')
                            </div>
                            <div class="content">
                               {!! Form::model($user, ['method' => 'PATCH', 'url' => url('/users', $user->users_id), 'class' => 'form-horizontal',  'files' => true]) !!}
                                {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-5">
                                                <label>Username</label>
                                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username', $user->username) }}" autofocus>
                                        </div>
                                        <div class="col-md-3">
                                                <label>E-Mail Address</label>
                                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email', $user->email) }}">
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                                <label>Role</label>
                                                <select name="role_id" class="form-control">
                                                @foreach ($role as $key => $value)
                                                <option {{ old('role_id', $user->role_id) == $key ? "selected" : "" }} value="{{ $key }}"> {{ $value }}
                                                @endforeach
                                                </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                                <label>Avatar</label>
                                                <input type="file" id="avatar" name="avatar" class="form-control">
                                        </div>
                                    </div>

                                   <!--  <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" placeholder="City" value="Mike">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control" placeholder="Country" value="Andrew">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="number" class="form-control" placeholder="ZIP Code">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="5" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                                            </div>
                                        </div>
                                    </div> -->

                                    <button type="reset" class="btn btn-default btn-fill pull-right">Reset</button>
                                    <button type="submit" class="btn btn-info btn-fill">Save</button>
                                    <a type="button" class="btn btn-primary" href="{{ url('users/') }}"> Back </a>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>

@endsection
