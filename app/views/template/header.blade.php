@section("header")
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
          <title>Inc Spark | Discover NYC's Entrepreneurial Events</title>
          <!-- Template
          
        <link type="text/css" rel="stylesheet" href="/bootstrap/css"/>
        <script type="text/javascript" src="/bootstrap/js"></script>
          
          -->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <link type="text/css" rel="stylesheet" href="/bootstrap/css/bootstrap-theme.css"/>
        <link type="text/css" rel="stylesheet" href="/bootstrap/css/bootstrap.css"/>
        <link type="text/css" rel="stylesheet" href="/bootstrap/css/main.css"/>
        
        <script type="text/javascript" src="/bootstrap/js/bootstrap.js"></script>
      
    </head>
    <header>
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <!-- Mobile nav-->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                  </button>
         <a class="navbar-brand" href="{{ url('index')}}">IncSpark</a>
         
                </div>
                <!-- Mobile nav-->
                
                <!-- Desktop -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li ><a href="#">About Us</a></li>
                        <li ><a href="#">Featured Events</a></li>
                        <li ><a href="#">Discover</a></li>
                        <li class="dropdown">
                            @if(!empty($data))
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login | Sign Up</a>
                                <span class="caret"></span>
                                <ul class="dropdown-menu" id="comestic-login-holder">
                                    <li>
                                        <form method="POST" action="">
                                            <span id="comestic-login-info">Are you an Inc Spark User? <br>Login with...</span>
                                            <div class="input-group" id="comestic-login-input">
                                                <input type="text" class="form-control" placeholder="Username">
                                                <input type="password" class="form-control" placeholder="Password">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default">Login</button>
                                                    <button type="button" class="btn btn-default">Register</button>
                                                    <button type="button" class="btn btn-default">Forgot Info?</button>
                                                </div>
                                            </div>
                                        </form>
                                    </li>
                                    <li class="divider"></li>
                                    <span id="comestic-login-info">or you can login with....</span>
                                    <li id="#comestic-login-facebook"><div class="fb-login-button" data-max-rows="1" data-size="large" data-show-faces="false" data-auto-logout-link="true"></div></li>
                                    
                                </ul>
                            </li>
                            <li class="dropdown">
                                @else
                                <a href="#" data-toggle="dropdown">Hey Username </a>
                                     <span class="caret"></span>
                                     <ul class="dropdown-menu">
                                         <li><a href="{{ url('logout') }}">Logout</a></li>
                                         <li><a href="{{ url('user') }}">Edit </a></li>
                                     </ul>
                                @endif
                            </a>
                            </li>
                    </ul>
                </div>
                <!-- Desktop -->
            </div>
        </nav>
    </header>
    
 @include("template/fbsdk")
    <body>
@show