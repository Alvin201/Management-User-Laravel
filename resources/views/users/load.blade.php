<div id="load"> 
@if(count($users)> 0)

        <table class="table table-hover table-striped">
          <thead>
                <!--<th>#</th>-->
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

<!-- <form action="{{ url('users/destroyAll') }}" method="POST">
    {{ csrf_field() }}
 -->

          <tbody>
                <tr>
                        <!-- <td><input type="checkbox" name="checked[]" value="{{ $user->users_id }}" /></td> -->
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

<!-- <button class="btn btn-info" type="submit"> Bulk Delete</button>
 </form> -->
         </table>

   @else
   <center><p style="margin-left:5px;margin-top: 5%;">Data not found</p></center>
   @endif
   </div>

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
