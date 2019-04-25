<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NUTNOI</title>
        <!-- Load Roboto font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Load css styles -->
        <link rel="stylesheet" href="{{ asset('css/myCss.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-responsive.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/pluton.css') }}" />
        
        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/pluton-ie7.css" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.cslider.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.bxslider.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}" />
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57.png">
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div id="app">
        <div class="navbar">
            <div class="navbar-inner">
                
                <a href="/home" class="">
                    <img src="{{ asset('images/logo.png') }}" width="120" height="90" alt="Logo" />
                        <!-- This is website logo -->
                </a>
                    <!-- Navigation button, visible on small resolution -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-menu"></i>
                    </button>
                    <!-- Main navigation -->
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav" id="top-navigation">
                            @guest
                            <li class="active">
                                <a href="/home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @if (Auth::user()->type != "admin" && Auth::user()->project_id != NULL && Auth::user()->haveWaitTable != NULL )
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ action('UserController@showTable') }}" >{{ __('ShowTable') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ action('UserController@profile') }}" >{{ __('Profile') }}</a>
                                </li>
                            @endif
                            @if (Auth::user()->type == "admin")
                            
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ action('AdminController@addproject') }}" >{{ __('adminaddP') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ action('AdminController@admin') }}" >{{ __('Manager') }}</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="{{ action('AdminController@addproject') }}" >{{ __('addProject_byadmin') }}</a>
                            </li>
                            @endif
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ action('UserController@showstatic') }}" >{{ __('showstatistics') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ action('UserController@showproject') }}" >{{ __('Project List') }}</a>
                            </li>
                            @if (Auth::user()->type != "admin")
                                @if (Auth::user()->haveWaitTable != NULL && Auth::user()->project_id == NULL)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ action('UserController@addproject') }}" >{{ __('Add Project') }}</a>
                                    </li>
                                @endif
                            @endif
                            <li class="nav-item dropdown">
                                @if (Auth::user()->type != "admin")
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ action('UserController@profile') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @else <a id="navbarDropdown" class="nav-link dropdown-toggle" href="/home" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @endif 
                                    {{ Auth::user()->name }} 
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                   
                                </div>
                            </li>
                        @endguest
                        </ul>
                    </div>
                    <!-- End main navigation -->
                
            </div>   
    </div> 
    <div  class="da-slider" >
      
        <div class="mask"></div>
                       
        <div class="container">     
            @yield('content')
            
            </div>
        
  
    </div>
   
  
       
       
        <!-- Newsletter section start -->
        <div class="section third-section">
            <div class="container newsletter">
                <div class="sub-section">
                    <div class="title clearfix">
                        <div class="pull-left">
                            <h3>NUTNOI tdc.</h3>
                        </div>
                    </div>
                </div>
                <div id="success-subscribe" class="alert alert-success invisible">
                    <strong>Well done!</strong>You successfully subscribet to our newsletter.</div>
                <div class="row-fluid">
                    <div class="span5">
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                    </div>
                    <div class="span7">
                       
                        <div id="err-subscribe" class="error centered">Please provide valid email address.</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter section end -->
       
        <!-- Footer section start -->
        <div class="footer">
            <p>&copy; 2019 make by <a href="https://github.com/thapakorn613/NutNoi">NUTNOI</a>, <a href="http://goo.gl/NM84K2">Documentation</a></p>
        </div>
        <!-- Footer section end -->
        <!-- ScrollUp button start -->
        <div class="scrollup">
            <a href="#">
                <i class="icon-up-open"></i>
            </a>
        </div>


        
        <!-- ScrollUp button end -->
        <!-- Include javascript -->
        <script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.mixitup.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/modernizr.custom.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.js"></script>
        <script type="text/javascript" src="js/jquery.cslider.js"></script>
        <script type="text/javascript" src="js/jquery.placeholder.js"></script>
        <script type="text/javascript" src="js/jquery.inview.js"></script>
        <!-- Load google maps api and call initializeMap function defined in app.js -->
        <script async="" defer="" type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&callback=initializeMap"></script>
        <!-- css3-mediaqueries.js for IE8 or older -->
        <!--[if lt IE 9]>
            <script src="js/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript" src="js/app.js"></script>



<script>
        // Get the modal
        var modal = document.getElementById('myModal');
        
        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        
        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          modal.style.display = "block";
        }
        
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
        </script>


<script>
    // Get the modal
    var modal1 = document.getElementById('myModal1');
    
    // Get the button that opens the modal
    var btn1 = document.getElementById("myBtn1");
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks the button, open the modal 
    btn1.onclick = function() {
      modal1.style.display = "block";
    }
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal1.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal1) {
        modal1.style.display = "none";
      }
    }
    </script>
    
<script>
    // Get the modal
    var modal2 = document.getElementById('myModal2');
    
    // Get the button that opens the modal
    var btn2 = document.getElementById("myBtn2");
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks the button, open the modal 
    btn2.onclick = function() {
      modal2.style.display = "block";
    }
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal2.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal2) {
        modal2.style.display = "none";
      }
    }
    </script>

</body>
</html>
