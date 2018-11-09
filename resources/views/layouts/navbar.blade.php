@if (!Auth::guest())
<ul class="nav">
    
    @if (empty(Auth::user()->avatar) )
    <center><img src="{{ asset('avatar/default-avatar.png')}}" class="img-circle" style="width: 80px;height: 80px;"></a></center>
    @else
    <center><img src="/avatar/{{ Auth::user()->avatar }}" class="img-circle" style="width: 80px;height: 80px;"></a></center>
    @endif
    <br/>       
            @foreach(App\Models\Menu::get() as $menuItem)

                  @if( $menuItem->parent_id == 0 )
                      
                      <li class="sidebar-dropdown {{ Request::segment(1) === $menuItem->segment ? 'active' : null }}"> 
                        <a class="nav-link dropdown-toggle" href="{{ $menuItem->children->isEmpty() ? $menuItem->url : '#' }}"{{ $menuItem->children->isEmpty() ? '' : " id='menu' data-toggle='dropdown' aria-haspopup='true' " }} >    
                        <i class="fa {{ $menuItem->icon }}"></i>
                        <p>{{ $menuItem->nama }}</p>
                        </a>
                   @endif
  
                     @if( ! $menuItem->children->isEmpty() )    
                        <div class="sidebar-submenu">
                        <ul>    
                            @foreach($menuItem->children as $subMenuItem)
                             <li style="list-style-type: none;" class="{{ Request::segment(1) === $subMenuItem->segment ? 'active' : null }}">
                                <a href="{{ $subMenuItem->url }}"><i class="fa {{ $subMenuItem->icon }}"></i><p>{{ $subMenuItem->nama }}</p></a></li>
                            @endforeach
                        </ul>
                        </div>
                      </li>
                            
                      @endif
                      </li> 
            @endforeach

                   

        </ul>
            @endif

            <script type="text/javascript">
            $(".sidebar-submenu").stop().slideToggle('slow');

            $(".sidebar-dropdown > a").click(function() {
              $(".sidebar-submenu").slideUp(650);
              if (
                $(this)
                  .parent()
                  .hasClass("active")
              ) {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                  .parent()
                  .removeClass("active");
              } else {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                  .next(".sidebar-submenu")
                  .slideDown(250);
                $(this)
                  .parent()
                  .addClass("active");
              }
            });

            $("#toggle-sidebar").click(function() {
              $(".page-wrapper").toggleClass("toggled");
            });

            </script>