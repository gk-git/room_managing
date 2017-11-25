<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>App Login Concept</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Comfortaa:400,700'>

    <style type="text/css">
        
        *, *:before, *:after {
  box-sizing: border-box;
}

html, body {
  height: 100%;
  width: 100%;
  overflow: hidden;
}

.container {
  padding: 1px 0;
  height: 100%;
  width: 100%;
  background-image: url("{{url('event/campbackground.jpg')}}");
  background-size: cover;
  color: #fff;
  font-family: "Comfortaa", "Helvetica", sans-serif;
}

.login {
  max-width: 280px;
  min-height: 500px;
  margin: 30px auto;
  background-color: rgba(10,10,10,.68);
}

.login-icon-field {
  height: 250px;
  width: 100%;
  /*background-color: red;*/
}

.login-icon {
  margin: 50px 65px;
}

.login-form {
  padding: 8px 20px 20px;
  height: 120px;
  width: 100%;
  /*background-color: green;*/
}

.row {
  display: none;
}

.username-row {
  position: relative;
  height: 40px;
  /*background-color: pink;*/
  border-bottom: 1px solid;
  margin-bottom: 10px;
}

.password-row {
  position: relative;
  height: 40px;
 /* background-color: grey;*/
  border-bottom: 1px solid;
}

.password-icon,
.user-icon {
  margin: 5px;
}

.password-icon .key-path,
.user-icon .user-path{
  fill: rgba(10,10,10,0);
  stroke: #fff;
  stroke-width: 3.5;
  stroke-linecap: round;
  stroke-linejoin: round;
  stroke-miterlimit: 10;
  stroke-dasharray: 300;
  stroke-dashoffset: 300;
  -webkit-animation: dash 3s .3s linear forwards;
  animation: dash 3s .3s linear forwards;
}

.user-icon .user-path {
  -webkit-animation: dash 3s .8s linear forwards;
  animation: dash 3s .8s linear forwards;
}

input {
  position: absolute;
  width: 195px;
  height: 30px;
  margin: 5px 0;
  background: transparent;
  border: none;
}

input:focus,
button:focus {
  outline: none;
}

input::-webkit-input-placeholder {
  color: rgba(255,255,255,.4);
}

input::-moz-placeholder {
  color: rgba(255,255,255,.4);
}

.call-to-action {
  margin: 22px 0;
  height: 130px;
  width: 100%;
  /*background-color: blue;*/
}

button {
  display: block;
  width: 240px;
  height: 40px;
  padding: 0;
  margin: 10px 20px 10px;
  font-weight: 700;
  color: #fff;
  background-color: #22c08a;
  border: none;
  border-radius: 20px;
  transition: background-color .10s ease-in-out;
  -webkit-user-select:none;
  -moz-user-select:none;
  -ms-user-select:none;
  user-select:none;
}

button:hover {
  background-color: #26d69a;
}

button:active {
  background-color: #1eaa7a;
}

p {
  display: inline-block;
  width: 200px;
  margin: 0 40px;
  font-size: .8rem;
  color: rgba(255,255,255,.4);
  /*background-color: yellow;*/
}

p a {
  color: #fff;
}

label,
p a:hover {
  -webkit-cursor: pointer;
  cursor: pointer;
}

@-webkit-keyframes dash {
  to {
    stroke-dashoffset: 0;
  }
}

@keyframes dash {
  to {
    stroke-dashoffset: 0;
  }
}

input {
  color: #ffffff;
}

    </style>

  
</head>

<body>
  <!-- 

'Golazo' App Login Page Concept utilizing Velocity.js & SVG animation techniques.

Inspirations:
+Anton Aheichanka - https://dribbble.com/shots/1945593-Login-Home-Screen?list=users&offset=4
+Nicolay Talanov - https://codepen.io/suez/pen/dPqxoM

-->

<div class="container">
  <div id="login" class="login">
    
    <div class="login-icon-field">
        <img src="{{url('event/kashta.png')}}" height="280px" width="280px">
      <svg class="login-icon" >

      </svg>
    </div>
    <div class="login-form">
          @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> @lang('quickadmin.qa_there_were_problems_with_input'):
                    <br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

 <form class="form-horizontal"
                      role="form"
                      method="POST"
                      action="{{ url('login') }}">
                  
                    <input type="hidden"
                           name="_token"
                           value="{{ csrf_token() }}">

      <div class="username-row row">
        <label for="username_input">
        <svg version="1.1" class="user-icon" x="0px" y="0px"
        viewBox="-255 347 100 100" xml:space="preserve" height="36px" width="30px">
          <path class="user-path" d="
          M-203.7,350.3c-6.8,0-12.4,6.2-12.4,13.8c0,4.5,2.4,8.6,5.4,11.1c0,0,2.2,1.6,1.9,3.7c-0.2,1.3-1.7,2.8-2.4,2.8c-0.7,0-6.2,0-6.2,0
          c-6.8,0-12.3,5.6-12.3,12.3v2.9v14.6c0,0.8,0.7,1.5,1.5,1.5h10.5h1h13.1h13.1h1h10.6c0.8,0,1.5-0.7,1.5-1.5v-14.6v-2.9
          c0-6.8-5.6-12.3-12.3-12.3c0,0-5.5,0-6.2,0c-0.8,0-2.3-1.6-2.4-2.8c-0.4-2.1,1.9-3.7,1.9-3.7c2.9-2.5,5.4-6.5,5.4-11.1
          C-191.3,356.5-196.9,350.3-203.7,350.3L-203.7,350.3z"/>
        </svg>
        </label>
        <input type="text" id="username_input" class="username-input" placeholder="@lang('quickadmin.qa_email')"></input>
      </div>
      <div class="password-row row">
        <label for="password_input">
        <svg version="1.1" class="password-icon" x="0px" y="0px"
        viewBox="-255 347 100 100" height="36px" width="30px">
          <path class="key-path" d="M-191.5,347.8c-11.9,0-21.6,9.7-21.6,21.6c0,4,1.1,7.8,3.1,11.1l-26.5,26.2l-0.9,10h10.6l3.8-5.7l6.1-1.1
          l1.6-6.7l7.1-0.3l0.6-7.2l7.2-6.6c2.8,1.3,5.8,2,9.1,2c11.9,0,21.6-9.7,21.6-21.6C-169.9,357.4-179.6,347.8-191.5,347.8z"/>
        </svg>
        </label>
        <input type="password" id="password_input" class="password-input" class="input" placeholder="@lang('quickadmin.qa_password')"></input>
      </div>
     
       </form>
    </div>
    <div class="call-to-action">
                                <div class="col-md-6 col-md-offset-4">
                            <a href="{{ route('auth.password.reset') }}">@lang('quickadmin.qa_forgot_password')</a>
                            <br>
                            
                        </div>
      <button id="login-button" type="submit">@lang('quickadmin.qa_login')</button>
    </div>
  </div>
</div>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdn.jsdelivr.net/velocity/1.2.2/velocity.min.js'></script>
<script src='https://cdn.jsdelivr.net/velocity/1.2.2/velocity.ui.min.js'></script>

    <script type="text/javascript" >
        // jQuery & Velocity.js

function slideUpIn() {
          $("#login").velocity("transition.slideUpIn", 1250)
        };
        
        function slideLeftIn() {
          $(".row").delay(500).velocity("transition.slideLeftIn", {stagger: 500})    
        }
        
        function shake() {
          $(".password-row").velocity("callout.shake");
        }
        
        slideUpIn();
        slideLeftIn();
        $("button").on("click", function () {
          shake();
        });
    </script>

</body>
</html>
