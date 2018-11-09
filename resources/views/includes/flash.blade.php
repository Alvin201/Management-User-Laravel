<br/>
@if(Session::has('flash_message'))
                    <ul class="alert alert-success {{ Session::has('flash_message_important') ? 'alert-important': '' }}" id="success-alert">
                    	 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        @if(Session::has('flash_message_important'))
                        @endif
            			{{ Session::get('flash_message') }}
                    </ul>
                    @endif

<script type="text/javascript">
$(document).ready (function(){
            $("#success-alert").hide();
                $("#success-alert").fadeTo(2000, 800).slideUp(800, function(){
               $("#success-alert").slideUp(800);
                });

 });
</script>
