@extends('layouts.master')
@section('content')

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">User published : {{ $users->username }}</h4>
                               <!--  <p class="category">Here is a subtitle for this table</p> -->
                            </div>
                        <br/>

                            <div class="content table-responsive table-full-width" >

         @if(count($articles) > 0)
        <table class="table table-hover table-striped" id="myTable">
          <thead>
                <th>No</th>
                <th>Title</th>
                <th>Body</th>
                <th>Published On</th>
          </thead>
          @foreach($articles as $index => $row)
          <tbody>
                <tr>
                        <td>{{ $index +1 }}</td>
                        <td><a href="{{ url('/articles', $row->id) }}">{{ $row->title }}</a></td>
                        <td>{{ $row->body }}</td>
                        <td>{{ date('Y-m-d H:i:s', strtotime($row->published_at)) }}</td>
                </tr>
          </tbody>
          @endforeach
          @else
                              <center>No data is here</center>
                              @endif
         </table>


                            </div>
                        </div>
                        {{ $articles->render() }}
                    </div>


@endsection
