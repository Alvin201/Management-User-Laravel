@extends('layouts.master')

@section('content')

 <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">{{ $judul }}</h4>
                                 @include('includes.flasherror')
                            </div>
                            <div class="content">
                               <form>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <p>Username : <strong>{{ $user->username }}</strong></p>


                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                               <p>Email : <strong>{{ $user->email }}</strong></p>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p>Created On : <strong>{{ $user->created_at->format('m/d/Y H:m:s') }}</strong></p>
                                            </div>
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

                                   <a type="button" class="btn btn-primary" href="{{ url('users/') }}"> Back </a>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
@endsection