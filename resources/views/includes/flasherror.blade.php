<br/>
 @if($errors->any())
                    <ul class="alert alert-danger" id="danger-alert">
                    	 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

<script type="text/javascript">
$(document).ready (function(){
            $("#danger-alert").hide();
                $("#danger-alert").fadeTo(2000, 800).slideUp(800, function(){
               $("#danger-alert").slideUp(800);
                });

 });
</script>
