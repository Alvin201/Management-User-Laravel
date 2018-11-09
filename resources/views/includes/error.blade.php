<br/>
@if(Session::has('error_message'))
                    <ul class="alert alert-danger {{ Session::has('error_message_important') ? 'alert-important': '' }}" id="error-alert">
                    	 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        @if(Session::has('error_message_important'))
                        @endif
            			{{ Session::get('error_message') }}
                    </ul>
                    @endif

<script type="text/javascript">
$(document).ready (function(){
            $("#error-alert").hide();
                $("#error-alert").fadeTo(2000, 800).slideUp(800, function(){
               $("#error-alert").slideUp(800);
                });

 });
</script>
