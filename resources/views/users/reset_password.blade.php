@extends('layouts.master')

@section('content')

 <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Reset Password for user : <strong>{{ $user->username }} </strong></h4>
                                 @include('includes.flasherror')
                            </div>
                            <div class="content">
                               {!! Form::open(['method' => 'PATCH', 'url' => url('/users/'.$user->users_id.'/reset_password'), 'class' => 'form-horizontal']) !!}

                                {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-5">
                                                <label>New Password</label>
                                               <input type="password" class="form-control" name="password" required>
                                        </div>


                                        <div class="col-md-3">
                                                <label>Confirm Password</label>
                                                <input type="password" class="form-control" name="password_confirmation" required>
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
