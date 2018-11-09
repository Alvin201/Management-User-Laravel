@extends('layouts.master')

@section('content')



 <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">{{ $judul }}</h4>
                            </div>
                            <div class="content">
                                    <div class="row">
                                        <div class="col-md-5">
                                                <label>Title</label>
                                                <input type="text" class="form-control" name="title" value="{{ old('title', $article->title) }}" readonly="">
                                        </div>
                                        <div class="col-md-3">
                                                <label>Content</label>
                                                <input type="text" class="form-control" name="body" value="{{ old('body', $article->body) }}" readonly="">
                                        </div>
                                        <div class="col-md-4">
                                                <label for="exampleInputEmail1">Published On</label>
                                                 <input type="text" class="form-control" name="published_at" value="{{ old('body', $article->published_at) }}"" readonly="">
                                        </div>
                                    </div>
<br/>
                                    <a type="button" class="btn btn-primary" href="{{ url('articles/') }}"> Back </a>
                                    <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

         
@endsection