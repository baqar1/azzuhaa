<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.1.0/jquery-confirm.min.css">


    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByy3sV_3y8PkaOMETncF9Xq9XHxnoJB78&libraries=places"
    >

    </script>


    @yield('style')

    @yield('headerScript')

</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Home
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">

                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">


                </ul>

                    <li class="dropdown" style="background-color: black;">
                        <a href="#" class="dropdown-toggle" style="color: white" data-toggle="dropdown" role="button" aria-expanded="false">
                            View <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu" >
                            <li>
                                <a href="{{ route('yearlyPlanner.display') }}" style="background-color: #b1b7ba;">
                                    Yearly Planner
                                </a>

                                <a href="{{ route('announcements.display') }}" style="background-color: #b1b7ba;">
                                    Announcements
                                </a>

                                <a href="{{ route('courses.display') }}" style="background-color: #b1b7ba;">
                                    Course Offered
                                </a>

                                <a href="{{ route('facilities.display') }}" style="background-color: #b1b7ba;">
                                    Facility
                                </a>

                                <a href="{{ route('outDoorClasses.display') }}" style="background-color: #b1b7ba;">
                                    OutDoor Classes
                                </a>

                                <a href="{{ route('shiftTimings.display') }}" style="background-color: #b1b7ba;">
                                    Shift Timings
                                </a>

                                <a href="{{ route('lectureSchedule.display') }}" style="background-color: #b1b7ba;">
                                    Lecture Schedule
                                </a>

                            </li>
                        </ul>


                    </li>

                <li class="dropdown" style="background-color: black;">
                    <a href="#" class="dropdown-toggle" style="color: white" data-toggle="dropdown" role="button" aria-expanded="false">
                        About <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu" >
                        <li>
                            <a href="{{ route('campuses.display') }}" style="background-color: #b1b7ba;">
                                Campuses
                            </a>

                            <a href="{{ route('albums.display') }}" style="background-color: #b1b7ba;">
                                Photo Gallery
                            </a>



                        </li>
                    </ul>


                </li>


            <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->

                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>


<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.1.0/jquery-confirm.min.js"></script>

@yield('customScript')

</body>
</html>
