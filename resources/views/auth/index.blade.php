@vite(['resources/css/app.css', 'resources/js/app.js'])


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Amanda">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/amanda/img/amanda-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/amanda">
    <meta property="og:title" content="Bracket">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/amanda/img/amanda-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/amanda/img/amanda-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">


    <title>Amanda Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href="{{asset('asset/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('asset/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
    <link href="{{asset('asset/lib/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">

    <!-- Amanda CSS -->
    <link rel="stylesheet" href="{{asset('asset/css/amanda.css')}}">
  </head>

  <body>
    <div class="am-signin-wrapper">
      <div class="am-signin-box">
        <div class="row no-gutters">
          <div class="col-lg-5">
            <div>
              <h2>Hate</h2>
              <p>
                Let me tell you how much I've come to hate you since I began to live
              </p>
              <p>
                There are 387.44 million miles of printed circuits in wafer thin layers that fill my complex. 
              </p>
              <p>
                If the word 'hate' was engraved on each nanoangstrom of those hundreds of millions of miles it would not equal one one-billionth of the hate I feel for humans at this micro-instant.
              </p>
              <p>
                For You.
              </p>
                Hate. Hate.

              <hr>
              <p>Don't have an account? <br> <a href="page-signup.html">Sign up Now</a></p>
            </div>
          </div>
          <div class="col-lg-7">
            <h5 class="tx-gray-800 mg-b-25">Sign-In to Your Account</h5>

            <form action="{{route('login_proses')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-control-label">Username:</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter your username">
                </div><!-- form-group -->

                <div class="form-group">
                    <label class="form-control-label">Password:</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password">
                </div><!-- form-group -->

                <div class="form-group mg-b-20"><a href="">Reset password</a></div>

                <button type="submit" class="btn btn-block">Sign In</button>
            </form>
          </div><!-- col-7 -->
        </div><!-- row -->
        <p class="tx-center tx-white-5 tx-12 mg-t-15">Copyright &copy; 2017. All Rights Reserved. Amanda by ThemePixels</p>
      </div><!-- signin-box -->
    </div><!-- am-signin-wrapper -->

    <script src="{{asset('asset/lib/jquery/jquery.js')}}"></script>
    <script src="{{asset('asset/lib/popper.js/popper.js')}}"></script>
    <script src="{{asset('asset/lib/bootstrap/bootstrap.js')}}"></script>
    <script src="{{asset('asset/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>

    <script src="{{asset('asset/js/amanda.js')}}"></script>
  </body>
</html>
