<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home Screen</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/blog-home.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">About</a>
                </li>
                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.index')}}">Admin</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->

    <div class="row">
        <div class="col-md-4">
            <nav class="nav flex-column navbar-dark bg-dark h-100">
                    <ul class="navbar-nav text-center mb-4">
                        <h1 class="mt-3 text-white">Stephen<br>James<br>Jackson</h1>
                        <div class="subheading mb-2 text-white">
                            Located near Blackpool
                        </div>

                        <hr>
                        <li class="nav-item"><a class="nav-link" href="{{route('about')}}">About Me</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('interests')}}">Interests</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('experience')}}">Experience</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('education')}}">Education</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('applications')}}">Applications</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('piprojects')}}">Projects</a></li>
                    </ul>
                <div class="social-icons text-center mb-5">
                    <a
                        class="social-icon"
                        href="mailto:jjackson19862017@gmail.com"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Email me"
                    ><i class="far fa-envelope"></i
                        ></a>
                    <a
                        class="social-icon"
                        href="https://www.linkedin.com/in/stephenjamesjackson/"
                        target="_blank"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Visit my Linkedin page"
                    ><i class="fab fa-linkedin-in"></i
                        ></a>
                    <a
                        class="social-icon"
                        href="https://github.com/jjackson19862017"
                        target="_blank"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Visit my Github"
                    ><i class="fab fa-github"></i
                        ></a>
                    <a
                        class="social-icon"
                        href="https://www.youtube.com/channel/UCZDFJ__Vu_ds0hzPoTPrmIQ/"
                        target="_blank"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Visit my YouTube Channel"
                    ><i class="fab fa-youtube-square"></i
                        ></a>
                </div>

            </nav>

        </div>
        <div class="col-md-8">
            @yield('content')
        </div>

    </div>
    <!-- /.row -->



<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>
