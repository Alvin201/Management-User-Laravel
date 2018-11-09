@extends('layouts.master')

@section('content')


                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Manage Users</h4>
                                @include('includes.flash')
                                @include('includes.error')
                                @include('includes.flasherror')
                            </div>
                        <br/>
                 
                <div id="form-upload" style="display: none;margin-bottom: 5px" >       
                  <form style="border: 1px solid lightblue;padding: 10px;width:40%;border-radius:10px;margin-left: 15px;"  action="{{ URL::to('users/importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                      <div class="input-group">
                            <input type="file" name="import_file" style="color:lightblue;font-weight: 500;" />
                        <div class="input-group-btn">
                          <button class="btn btn-primary btn-xs" type="submit"><i class="fa fa-upload"></i> Import File</button>
                        </div>
                      </div>          
                  </form>
                </div>
                <br/>
                <br/>

                 <div class="col-sm-2 form-group">
                              <select onchange="ajaxLoad('{{url('users')}}?pagination_items='+this.value)" 
                              name="pagination_items" class="form-control">
                              <option disabled="disabled" selected="selected">Show Record</option>
                              <option value="5">5</option>
                              <option value="10">10</option>
                              <option value="25">25</option>
                              <option value="30">30</option>
                              <option value="{{$users->total()}}">All</option>
                            </select>
                 </div>



                          <div class="col-sm-6 form-group">
                            <div class="input-group">
                              <input class="form-control" id="search" value="{{ request()->session()->get('search') }}"
                               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('users')}}?search='+this.value)"
                               placeholder="Search Username / Email" name="search" type="text" id="search"/>     
                              <div class="input-group-btn">
                                <button type="submit" class="btn btn-default" onclick="ajaxLoad('{{url('users')}}?search='+$('#search').val())">
                                <i class="fa fa-search"></i>
                                </button>
                              </div>
                            </div>
                          </div>
                
                      <div class="form-group" style="margin-left: 80%;" > 
                          <button type="button" rel="tooltip" title="Add Task" class="btn btn-info btn-simple btn-xs" onclick="location.href='{{ url("users/create")}}'">
                              <i class="fa fa-plus"></i>
                          </button>
                          
                          <button rel="tooltip" title="Refresh" class="btn btn-info btn-simple btn-xs" onclick="Refresh()"><i class="fa fa-refresh"></i></button>
                          
                          <a href="{{ URL::to('users/downloadExcel/xls') }}"><button class="btn btn-info btn-simple btn-xs" rel="tooltip" title="Download xls"><i class="fa fa-download"></i></button></a>
                          
                          <a href="{{ URL::to('users/downloadExcel/xlsx') }}"><button class="btn btn-info btn-simple btn-xs" rel="tooltip" title="Download xlsx"><i class="fa fa-download"></i></button></a>
                          
                          <button type="button" rel="tooltip" title="Import Task" class="btn btn-info btn-simple btn-xs" onclick="toggleDiv('form-upload');">
                              <i class="fa fa-upload"></i>
                          </button>

                      </div>   
                                
        @if(count($users)> 0)
        <table  class="table table-hover table-striped">
          <thead>
                <th>No</th>
            
                <th>
                 <a onclick="ajaxLoad('{{url('users?field=username&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')" style="cursor:pointer;">
                    Username
                </a>
                {{request()->session()->get('field')=='username'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}  
                </th>
                               
                
                <th>
                 <a onclick="ajaxLoad('{{url('users?field=role_id&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')" style="cursor:pointer;">
                    Akses
                </a>
                {{request()->session()->get('field')=='role_id'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}  
                </th>

                <th>
                <a onclick="ajaxLoad('{{url('users?field=email&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')" style="cursor:pointer;">
                Email
                </a>
                {{request()->session()->get('field')=='email'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}  
                </th>

                <th>
                <a onclick="ajaxLoad('{{url('users?field=created_at&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')" style="cursor:pointer;">  
                Created At
                </a>
                {{request()->session()->get('field')=='created_at'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}  
                </th>

                <th>
                <a onclick="ajaxLoad('{{url('users?field=updated_at&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')" style="cursor:pointer;">
                Updated At
                </a>
                {{request()->session()->get('field')=='updated_at'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}  
                </th>
                <th>Action</th>
          </thead>

           @foreach($users as $index => $user)
          <tbody>
                <tr>
                        <td>{{ $index +1 }}</td>
                        <td><a href="{{ url('/users', $user->users_id) }}">{{ $user->username }}</a></td>
                        <td>{{ $user->role['name_role'] }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ \App\Helpers\Utils::humanDate($user->created_at) }}</td>
                        <td>{{ \App\Helpers\Utils::humanDate($user->updated_at) }}</td>
                        <td>
                            <button type="button" rel="tooltip" title="Show Task" class="btn btn-info btn-simple btn-xs" onclick="location.href='{{ url("users/$user->users_id/detail")}}'">
                            <i class="fa fa-eye"></i>
                            </button>

                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs" onclick="location.href='{{ url("users/$user->users_id/edit")}}'">
                            <i class="fa fa-edit"></i>
                            </button>

                            <button type="button" rel="tooltip" title="Reset Password" class="btn btn-info btn-simple btn-xs" onclick="location.href='{{ url("users/$user->users_id/reset_password")}}'">
                            <i class="fa fa-key"></i>
                            </button>

                            {!! Form::open(['method' => 'DELETE','url' => ['users', $user->users_id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-simple btn-xs confirm' , 'data-confirm' => 'Are you sure you want to delete?']) !!}
                            {!! Form::close() !!}
                        </td>
                </tr>
          </tbody>
          @endforeach
         </table>

   @else
   <center><p style="margin-left:5px;margin-top: 5%;">Data not found</p></center>
   @endif

  <div style="margin-left:1%;"> {!! str_replace('/?','?',$users->render()) !!} </div>
  <p style="margin-left:10px; font-size: 14px;"> Total Record : {{$users->total()}} </p>
  
  
  <script type="text/javascript">
      $('.confirm').on('click', function (e) {
          if (confirm($(this).data('confirm'))) {
              return true;
          }
          else {
              return false;
          }
      });
  </script>


  </div>
  </div>


<script type="text/javascript">
function toggleDiv(divId) {
   $("#"+divId).toggle(400);
} 
</script>


@endsection
