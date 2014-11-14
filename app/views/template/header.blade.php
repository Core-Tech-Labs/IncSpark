@section("header")
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
          <title>Inc Spark | The World's First Entrepreneurial Events Portal</title>
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
         <a class="navbar-brand" href="#">IncSpark</a>
         
                </div>
                <!-- Mobile nav-->
                
                <!-- Desktop -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li ><a href="#">Nav Item 1</a></li>
                        <li ><a href="#">Nav Item 2</a></li>
                        <li ><a href="#">Nav Item 3</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login | Sign Up
                                <span class="caret"></span>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Sub-menu1</a></li>
                                    <li class="divider"></li>
                                    <li id="comestic-login"><div class="fb-login-button" data-max-rows="1" data-size="large" data-show-faces="false" data-auto-logout-link="true"></div></li>
                                </ul>
                            </a></li>
                    </ul>
                </div>
                <!-- Desktop -->
            </div>
        </nav>
    </header>
    
 @include("template/fbsdk")
    <body>
@show