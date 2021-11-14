
<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Decapital Planner - Register</title>

    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Google fonts -->
    <link href="//fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- CSS Stylesheet -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="shortcut icon" type="image/x-icon" href="../assets_frontend/img/logoicon.png">

    <!-- fontawesome v5-->
    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

</head>

<body>
<meta name="robots" content="noindex">
<body><link rel="stylesheet" href="../assets_frontend/css/fontawesome.min.css">
<!-- New toolbar-->
<style>
    /*--
Author: W3layouts
Author URL: http://w3layouts.com
--*/

/* reset code */
html {
    scroll-behavior: smooth;
}

body,
html {
    margin: 0;
    padding: 0;
    color: #585858;
}

* {
    box-sizing: border-box;
    font-family: 'Kumbh Sans', sans-serif;
}

/*  wrapper */
.wrapper {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}

@media (min-width: 576px) {
    .wrapper {
        max-width: 540px;
    }
}

@media (min-width: 768px) {
    .wrapper {
        max-width: 720px;
    }
}

@media (min-width: 992px) {
    .wrapper {
        max-width: 960px;
    }
}

@media (min-width: 1200px) {
    .wrapper {
        max-width: 1140px;
    }
}

/*  /wrapper */

.d-grid {
    display: grid;
}

button,
input,
select {
    -webkit-appearance: none;
    outline: none;
}

button,
.btn,
select {
    cursor: pointer;
}

a {
    text-decoration: none;
}

h1,
h2,
h3,
h4,
h5,
h6,
p,
ul,
ol {
    margin: 0;
    padding: 0;
}

body {
    background: #f1f1f1;
    margin: 0;
    padding: 0;
}

form,
fieldset {
    border: 0;
    padding: 0;
    margin: 0;
}

img {
    max-width: 100%;
}

/*-- //Reset-Code --*/

/*-- form styling --*/
.signinform {
    /* padding: 40px 40px; */
    justify-content: center;
    display: grid;
    /* grid-template-rows: 1fr auto 1fr; */
    align-items: center;
    min-height: 100vh;
}

input[type="text"],
input[type="email"],
input[type="Password"] {
    font-size: 17px;
    font-weight: 500;
    color: #999;
    text-align: left;
    padding: 14px 15px 12px 35px;
    width: 100%;
    display: inline-block;
    box-sizing: border-box;
    border: none;
    outline: none;
    background: transparent;
    letter-spacing: .5px;
}

.input-group {
    margin-bottom: 25px;
    padding: 0px 0px;
    border-bottom: 1px solid #e5e5e5;
    position: relative;
}

.btn-block {
    display: block;
    width: 50%;
    margin: 0 auto;
}

.btn:active {
    outline: none;
}

.btn-primary {
    color: #fff;
    background-color: #6769e8;
    margin-top: 30px;
    outline: none;
    width: 100%;
    padding: 15px 15px;
    cursor: pointer;
    font-size: 18px;
    font-weight: 600;
    border-radius: 30px;
    -webkit-border-radius: 30px;
    -moz-border-radius: 30px;
    -ms-border-radius: 30px;
    -o-border-radius: 30px;
    border: none;
    text-transform: capitalize;
}


.btn-primary:hover {
    background-color: #4d50c4;
    color: #fff;
}

.form-row.bottom {
    display: flex;
    justify-content: space-between;
}

.form-row .form-check input[type="checkbox"] {
    display: none;
}

.form-row .form-check input[type="checkbox"]+label:before {
    border-radius: 3px;
    border: 1px solid #e2e2e2;
    color: transparent;
    content: "\2714";
    display: inline-block;
    height: 18px;
    margin-right: 5px;
    transition: 0.2s;
    vertical-align: inherit;
    width: 18px;
    text-align: center;
    line-height: 20px;
}

.form-row .form-check input[type="checkbox"]:checked+label:before {
    background-color: #4d61fc;
    border-color: #4d61fc;
    color: #fff;
}

.form-row .form-check input[type="checkbox"]+label {
    cursor: pointer;
    color: #888;
}

.w3_info h2 {
    display: inline-block;
    font-size: 25px;
    line-height: 35px;
    margin-bottom: 20px;
    font-weight: 600;
    color: #3b3663;
}

.w3_info h4 {
    display: inline-block;
    font-size: 15px;
    padding: 8px 0px;
    color: #444;
    text-transform: capitalize;
}


a.btn.btn-block.btn-social.btn-facebook {
    display: block;
    width: 100%;
    padding: 10px 0px;
    text-align: center;
    font-size: 16px;
    font-weight: 600;
}

h1 {
    text-align: center;
    font-size: 40px;
    font-weight: 500;
    color: #3b3663;
}

.w3_info {
    flex-basis: 50%;
    -webkit-flex-basis: 50%;
    box-sizing: border-box;
    padding: 3em 3.5em;
    background: #fff;
    box-shadow: 2px 9px 49px -17px rgba(0, 0, 0, 0.1);
}

.left_grid_info {
    padding: 6em 0;
}

.w3l-form-info {
    display: -webkit-box;
    /* OLD - iOS 6-, Safari 3.1-6 */
    display: -moz-box;
    /* OLD - Firefox 19- (buggy but mostly works) */
    display: -ms-flexbox;
    /* TWEENER - IE 10 */
    display: -webkit-flex;
    /* NEW - Chrome */
    display: flex;
    /* NEW, Spec - Opera 12.1, Firefox 20+ */
    /* margin: 40px 0; */
}


.w3l_form {
    padding: 0px;
    flex-basis: 50%;
    -webkit-flex-basis: 50%;
    background: #dad1f8;
}

.w3_info p {
    padding-bottom: 30px;
    text-align: center;
}

p.account,
p.account a {
    text-align: center;
    padding-top: 20px;
    padding-bottom: 0px;
    font-size: 16px;
    color: #888;
}

p.account a {
    color: #6769e8;
}

p.account a:hover {
    text-decoration: underline;
}

a.forgot {
    color: #3b3663;
    margin-top: 2px;
}

a.forgot:hover {
    text-decoration: underline;
}

h3.w3ls {
    margin: 10px 0px;
    padding-left: 60px;
}

h3.agileits {
    padding-left: 10px;
}

.container {
    max-width: 890px;
    margin: 0 auto;
}

.input-group i.fa,
.input-group i.fas {
    font-size: 16px;
    vertical-align: middle;
    box-sizing: border-box;
    float: left;
    width: 6%;
    margin-top: 19px;
    text-align: center;
    color: #999;
    opacity: .5;
    position: absolute;
    left: 0;
}

h5 {
    text-align: center;
    margin: 10px 0px;
    font-size: 15px;
    font-weight: 600;
    color: #000;
}

.footer p {
    text-align: center;
    font-size: 18px;
    line-height: 28px;
    color: #777;
}

.footer p a {
    color: #6769e8;
}

.footer p a:hover {
    text-decoration: underline;
}

p.continue {
    margin-top: 25px;
    padding: 0;
    margin-bottom: 20px;
    color: #999;
    opacity: .8;
}

p.continue span {
    position: relative;
}

p.continue span:before {
    position: absolute;
    content: '';
    height: 1px;
    background: #999;
    width: 89%;
    left: -100%;
    top: 5px;
    opacity: .5;
}

p.continue span:after {
    position: absolute;
    content: '';
    height: 1px;
    background: #999;
    width: 89%;
    right: -100%;
    top: 5px;
    opacity: .5;
}

.social-login {
    display: grid;
    grid-auto-flow: column;
    grid-gap: 20px;
    margin-bottom: 10px;
}

.facebook {
    padding: 13px 20px;
    border: 2px solid #3b5998;
    border-radius: 35px;
    text-align: center;
    font-size: 16px;
    color: #3b5998;
}

.facebook:hover {
    background: #3b5998;
    color: #fff;
}

.google {
    padding: 13px 20px;
    border: 2px solid #ea4335;
    border-radius: 35px;
    text-align: center;
    font-size: 16px;
    color: #ea4335;
}

.google:hover {
    background: #ea4335;
    color: #fff;
}

.facebook span {
    margin-right: 5px;
}

.google span {
    margin-right: 5px;
}

::-webkit-input-placeholder {
    /* Edge */
    color: #aaa;
}

:-ms-input-placeholder {
    /* Internet Explorer 10-11 */
    color: #aaa;
}

::placeholder {
    color: #aaa;
}

/** Responsive **/
@media screen and (max-width: 1440px) {}


@media screen and (max-width: 1080px) {
    .w3_info {
        padding: 3em 3em;
    }
}

@media screen and (max-width: 1024px) {
    .left_grid_info h3 {
        font-size: 2em;
    }
}

@media screen and (max-width: 991px) {
    .w3_info h2 {
        font-size: 24px;
    }

    h1 {
        font-size: 35px;
    }
}

@media screen and (max-width: 900px) {

    .left_grid_info h4 {
        font-size: 1em;
    }

    .w3_info {
        padding: 3em 2.5em;
    }
}

@media screen and (max-width: 800px) {
    .w3_info h2 {
        font-size: 23px;
    }

    .w3l-form-info {
        flex-direction: column;
    }

    .w3l_form {
        order: 2;
        display: none;
    }

    .container {
        max-width: 550px;
    }

    .left_grid_info {
        padding: 3em 3em;
    }

}

@media screen and (max-width: 768px) {
    .left_grid_info {
        padding: 9em 3em;
    }
}

@media screen and (max-width: 736px) {
    .w3_info h2 {
        font-size: 22px;
    }

    .w3_info {
        padding: 3em 2em;
    }
}

@media screen and (max-width: 667px) {

    .left_grid_info {
        padding: 3em 3em;
    }

    .w3_info {
        padding: 3em 3em;
    }

    .w3l-form-info {
        margin: 20px 0 30px;
    }
}

@media screen and (max-width: 640px) {
    h1 {
        font-size: 37px;
    }
}

@media screen and (max-width: 480px) {
    .w3l_form {
        padding: 0em;
        display: none;
    }

    .w3_info {
        padding: 2em 2em;
    }

    h1 {
        font-size: 34px;
    }
}

@media screen and (max-width: 415px) {

    h1 {
        font-size: 32px;
    }

    .left_grid_info p {
        font-size: 13px;
    }

    .signinform {
        padding: 40px 20px;
    }
}

@media screen and (max-width: 384px) {

    .signinform {
        padding: 30px 15px;
    }

    .social-login {
        grid-auto-flow: row;
    }
}

@media screen and (max-width: 375px) {
    .left_grid_info h3 {
        font-size: 1.5em;
    }

    .form-row.bottom {
        flex-direction: column;
    }

    a.forgot {
        margin-top: 17px;
    }
}

@media screen and (max-width: 320px) {
    h1 {
        font-size: 25px;
    }

    .w3_info h2 {
        font-size: 18px;
    }

    .btn-primary {
        padding: 13px 12px;
        font-size: 13px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        font-size: 13px;
    }

    .footer p {
        font-size: 13px;
    }

    .footer p a {
        font-size: 13px;
    }
}

/** /Responsive **/

/*-- //form styling --*/
* {
  box-sizing: border-box;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
}


#w3lDemoBar.w3l-demo-bar {
  top: 0;
  right: 0;
  bottom: 0;
  z-index: 9999;
  padding: 40px 5px;
  padding-top:70px;
  margin-bottom: 70px;
  background: #0D1326;
  border-top-left-radius: 9px;
  border-bottom-left-radius: 9px;
}

#w3lDemoBar.w3l-demo-bar a {
  display: block;
  color: #e6ebff;
  text-decoration: none;
  line-height: 24px;
  opacity: .6;
  margin-bottom: 20px;
  text-align: center;
}

#w3lDemoBar.w3l-demo-bar span.w3l-icon {
  display: block;
}

#w3lDemoBar.w3l-demo-bar a:hover {
  opacity: 1;
}

#w3lDemoBar.w3l-demo-bar .w3l-icon svg {
  color: #e6ebff;
}
#w3lDemoBar.w3l-demo-bar .responsive-icons {
  margin-top: 30px;
  border-top: 1px solid #41414d;
  padding-top: 40px;
}
#w3lDemoBar.w3l-demo-bar .demo-btns {
  border-top: 1px solid #41414d;
  padding-top: 30px;
}
#w3lDemoBar.w3l-demo-bar .responsive-icons a span.fa {
  font-size: 26px;
}
#w3lDemoBar.w3l-demo-bar .no-margin-bottom{
  margin-bottom:0;
}
.toggle-right-sidebar span {
  background: #0D1326;
  width: 50px;
  height: 50px;
  line-height: 50px;
  text-align: center;
  color: #e6ebff;
  border-radius: 50px;
  font-size: 26px;
  cursor: pointer;
  opacity: .5;
}
.pull-right {
  float: right;
  position: fixed;
  right: 0px;
  top: 70px;
  width: 90px;
  z-index: 99999;
  text-align: center;
}
/* ============================================================
RIGHT SIDEBAR SECTION
============================================================ */

#right-sidebar {
  width: 90px;
  position: fixed;
  height: 100%;
  z-index: 1000;
  right: 0px;
  top: 0;
  margin-top: 60px;
  -webkit-transition: all .5s ease-in-out;
  -moz-transition: all .5s ease-in-out;
  -o-transition: all .5s ease-in-out;
  transition: all .5s ease-in-out;
  overflow-y: auto;
}


/* ============================================================
RIGHT SIDEBAR TOGGLE SECTION
============================================================ */

.hide-right-bar-notifications {
  margin-right: -300px !important;
  -webkit-transition: all .3s ease-in-out;
  -moz-transition: all .3s ease-in-out;
  -o-transition: all .3s ease-in-out;
  transition: all .3s ease-in-out;
}



@media (max-width: 992px) {
  #w3lDemoBar.w3l-demo-bar a.desktop-mode{
      display: none;

  }
}
@media (max-width: 767px) {
  #w3lDemoBar.w3l-demo-bar a.tablet-mode{
      display: none;

  }
}
@media (max-width: 568px) {
  #w3lDemoBar.w3l-demo-bar a.mobile-mode{
      display: none;
  }
  #w3lDemoBar.w3l-demo-bar .responsive-icons {
      margin-top: 0px;
      border-top: none;
      padding-top: 0px;
  }
  #right-sidebar,.pull-right {
      width: 90px;
  }
  #w3lDemoBar.w3l-demo-bar .no-margin-bottom-mobile{
      margin-bottom: 0;
  }
}
</style>
    <div class="signinform">
        <!-- container -->
        <div class="container">
            <!-- main content -->
            <div class="w3l-form-info">
                <div class="w3l_form">
                    <div class="left_grid_info">
                        <img src="./../assets_frontend/img/register.svg" alt=""/>
                    </div>
                </div>
                <div class="w3_info">
                    <div style="line-height: 6;">
                        <img class="float-start imgdecapital" src="./../assets_frontend/img/logobrand2.png" alt="">
                    </div>
                    <form action="/storeUser" class="needs-validation" novalidate method="POST">
                        {{ method_field('POST') }}
                        {{ csrf_field() }}
                        <div class="input-group">
                            <span><i class="fas fa-user" aria-hidden="true"></i></span>
                            <input type="text" name="firstname" placeholder="Firstname" required>
                        </div>
                        <div class="input-group">
                            <span><i class="fas fa-user" aria-hidden="true"></i></span>
                            <input type="text" name="lastname" placeholder="Lastname" required>
                        </div>
                        <div class="input-group">
                            <span><i class="fas fa-envelope" aria-hidden="true"></i></span>
                            <input type="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="input-group">
                            <span><i class="fa fa-mobile" aria-hidden="true"></i></span>
                            <input type="text" name="phone" placeholder="Mobile phone" required>
                        </div>
                        <div class="input-group">
                            <span><i class="fas fa-key" aria-hidden="true"></i></span>
                            <input type="Password" name="password" placeholder="Password" required>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Sign Up</button>
                    </form>
                    
                    <p class="account">Already have an account? <a href="{{route('signin')}}">Sign in</a></p>
                </div>
            </div>
            <!-- //main content -->
        </div>
        <!-- //container -->
    </div>


</body>

</html>
