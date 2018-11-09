@if (!Auth::guest())

  <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" id="watch"></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-envelope"></i>
                                    <p class="counter" 
                                    style="background-color: #fa3e3e;
                                        border-radius: 2px;
                                        color: #fff;
                                        padding: 1px 3px;
                                        font-size: 14px;
                                        position: absolute;
                                        top:-5px;
                                        right:-5px;">
                                         5
                                    </p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        </ul>

                    <ul class="nav navbar-nav navbar-right">
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
                                  <i class="fa fa-user"></i>
                                   {{ Auth::user()->username }}
                                    <b class="caret"></b>
                                    </p>

                              </a>
                            <ul class="dropdown-menu">
                            <li><a href="{{ url('/profile') }}"><i class="fa fa-cogs"></i> Edit</a></li>
                            <li><a href="{{ url('/password') }}"><i class="fa fa-key"></i> Password</a></li>
                            <li>
                            <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            </form>
                             <li><a href="#"><i class="fa fa-question-circle"></i> Help</a></li>
                            <li>
                            </li> 
                            </ul>
                        </li>
                        <li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>

        @endif

<script type="text/javascript">
window.setTimeout("renderDate()",1);
days = new Array("Sun","Mon","Tue","Wed","Thu",
"Fri","Sat");
months = new Array("Jan","Feb","Mar",
"Apr","May","Jun","Jul","Aug","Sep",
"Okt","Nov","Des");

function renderDate(){
var mydate = new Date();
var year = mydate.getYear();
if (year < 2000) {
if (document.all)
year = "19" + year;
else
year += 1900;
}
var day = mydate.getDay();
var month = mydate.getMonth();
var daym = mydate.getDate();
if (daym < 10)
daym = "0" + daym;
var hours = mydate.getHours();
var minutes = mydate.getMinutes();
var seconds = mydate.getSeconds();
var dn = "AM";
if (hours >= 12) {
dn = "PM";
hours = hours - 12;
}
if (hours == 0)
hours = 12;
if (minutes <= 9)
minutes = "0" + minutes;
if (seconds <= 9)
seconds = "0" + seconds;
document.getElementById("watch").innerHTML = "<B>"+days[day]+" "+daym+" "+months[month]+" "+year+"</B> | "+hours+":"+minutes+":"+seconds+" "+dn;
setTimeout("renderDate()",1000)
}
</script>