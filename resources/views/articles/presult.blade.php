@if(count($articles)> 0)
        <table class="table table-hover table-striped" id="myTable">
          <thead>
                <th >No</th>
                <th >Title</th>
                <th >Post On</th>
                <th >By</th>
                <th >Action</th>
          </thead>
           @foreach($articles as $index => $article)
          <tbody>
                <tr>
                        <td>{{ $index +1 }}</td>
                        <td><a href="{{ url('/articles', $article->id) }}">{{ $article->title }}</a></td>
                        <td>{{ \App\Helpers\Utils::humanDate($article->published_at) }}</td>
                        <td>{{ $article->user['username'] }}</td>
                        <td>
                        <!--  -->
                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs" onclick="location.href='{{ url("articles/$article->id/edit")}}'">
                            <i class="fa fa-edit"></i>
                            </button>

                            <a class="btn btn-danger btn-simple btn-xs remove-record" rel="tooltip" title="Remove Task" data-toggle="modal" data-url="{{ url('articles', $article->id) }}" data-id="{{$article->id}}" data-name="{{$article->title}}" data-target="#custom-width-modal"><i class="fa fa-times"></i></a>
                        <!--  -->

                        </td>
                </tr>
          </tbody>
          @endforeach
         </table>


         <!-- Delete Modal Dialog -->
           <form action="" method="POST" class="remove-record-model">
           {{ csrf_field() }}
           {{ Form::hidden('_method', 'DELETE') }}
           <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;" data-backdrop="false">
           <div class="modal-dialog" style="width:55%;">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                       <h4 class="modal-title" id="custom-width-modalLabel">Delete Record</h4>
                   </div>
                   <div class="modal-body">
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Close</button>
                       <button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>
                   </div>
               </div>
           </div>
       </div>
   </form>

@else
<p style="margin-left:5px;">Data not found</p>
@endif
<!--  -->
<script type="text/javascript">
$(document).ready(function(){
 // For A Delete Record Popup
 $('.remove-record').click(function() {
   var id = $(this).attr('data-id');
   var name = $(this).attr('data-name');
   var url = $(this).attr('data-url');
   $(".remove-record-model").attr("action",url);
   $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
   $('.modal-body').html('Yakin ingin menghapus Data dengan Field :  <strong style="color:blue;">' + name + '</strong> '); //modal-body
 });

 $('.remove-data-from-delete-form').click(function() {
   $('body').find('.remove-record-model').find( "input" ).remove();
 });
 $('.modal').click(function() {
   // $('body').find('.remove-record-model').find( "input" ).remove();
 });
});
</script>
