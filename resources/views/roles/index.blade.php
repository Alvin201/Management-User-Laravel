@extends('layouts.master')
@section('content')

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">{{ $judul }}</h4>
                               <!--  <p class="category">Here is a subtitle for this table</p> -->
                                @include('includes.flash')
                            </div>
                        <br/>

                        <button type="button" rel="tooltip" title="Add Task" class="btn btn-info btn-simple btn-xs" onclick="location.href='{{ url("roles/create")}}'">
                            <i class="fa fa-plus"></i>
                        </button>

                            <div class="content table-responsive table-full-width" >

                                @include('roles.presult')

                            </div>
                        </div>
                        {{ $roles->render() }}
                    </div>

     
@endsection
