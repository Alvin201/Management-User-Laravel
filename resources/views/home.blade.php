@extends('layouts.master')

@section('content')

  <div class="col-md-4">
      <div class="card">
   

    <!--Content-->
     <div class="header">
            <p class="title">Your Laravel version is : <strong>{{ $curent_version }}</strong></p>
            <h2 class="category">Year from Custom Helpers : {{ \App\Helpers\Utils::getDate() }}</h2>
     </div>

              <div class="content">
                            <!--    <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                                <div class="footer">
                           
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Open
                                        <i class="fa fa-circle text-danger"></i> Bounce
                                        <i class="fa fa-circle text-warning"></i> Unsubscribe
                                    </div>
                                    <hr>
                           
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> Campaign sent 2 days ago
                                    </div>
                           
                               </div>
                           </div> -->
              </div>      
    <!-- //Content   -->  
    </div>

    
    <div class="news">
    <span>News Feed</span>
    <ul>
      <li><a href="#">Student Bitten by Radioactive Bear...</a></li>
      <li><a href="#">Pluto Now Officially A Planet Again...</a></li>
      <li><a href="#">Study Reveals: Babies Are Stupid...</a></li>
      <li><a href="#">Elvis Presley Found Alive In Jersey...</a></li>
      <li><a href="#">Alien Life Confirmed on Uranus...</a></li>
      <li><a href="#">Archeologist Finds Skeleton People...</a></li>
      <li><a href="#">Microsoft Unveils Windows 21...</a></li>
      <li><a href="#">Developer Discovers Mobile Internet...</a></li>
      <li><a href="#">Bluetooth: The Silent Killer?...</a></li>
    </ul>
</div>



    </div>        
@endsection
