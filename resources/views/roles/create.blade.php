@extends('layouts.master')

@section('content')



 <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">{{ $judul }}</h4>
                                 @include('includes.flasherror')
                            </div>
                            <div class="content">
                                 <form class="form-horizontal" role="form" method="POST" action="{{ url('/roles') }}">
                                 {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-5">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="name_role" value="{{ old('name_role') }}">
                                        </div>

                                    </div>



                                    <button type="reset" class="btn btn-default btn-fill pull-right">Reset</button>
                                    <button type="submit" class="btn btn-info btn-fill">Save</button>
                                    <a type="button" class="btn btn-primary" href="{{ url('roles/') }}"> Back </a>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>



@endsection
