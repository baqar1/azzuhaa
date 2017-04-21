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
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">

                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">


                    </ul>

                    @if(Auth::guest())
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

                                </li>
                            </ul>


                        </li>


                    @else

                        <li class="dropdown" style="background-color: black;">
                            <a href="#" class="dropdown-toggle" style="color: white" data-toggle="dropdown" role="button" aria-expanded="false">
                                Add <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu" >
                                <li>
                                    <a href="{{ route('facility.add') }}" style="background-color: #b1b7ba;">
                                        Facility
                                    </a>
                                    <a href="{{ route('announcement.add') }}" style="background-color: #b1b7ba;">
                                        Announcement
                                    </a>
                                    <a href="{{ route('eventtype.add') }}" style="background-color: #b1b7ba;">
                                        Event Type
                                    </a>
                                    <a href="{{ route('event.create') }}" style="background-color: #b1b7ba;">
                                        Event
                                    </a>
                                    <a href="{{ route('campus.add') }}" style="background-color: #b1b7ba;">
                                        Campus
                                    </a>

                                    <a href="{{ route('shiftTiming.create') }}" style="background-color: #b1b7ba;">
                                        Shift Timing
                                    </a>

                                    <a href="{{ route('outdoorClass.create') }}" style="background-color: #b1b7ba;">
                                        Outdoor Classes
                                    </a>

                                    <a href="{{ route('courseType.create') }}" style="background-color: #b1b7ba;">
                                        Course Type
                                    </a>

                                    <a href="{{ route('course.create') }}" style="background-color: #b1b7ba;">
                                        Course
                                    </a>

                                    <a href="{{ route('albums.create') }}" style="background-color: #b1b7ba;">
                                        Gallery Album
                                    </a>

                                    <a href="{{ route('folders.create') }}" style="background-color: #b1b7ba;">
                                        Folder
                                    </a>


                                    <a href="{{ route('audioFiles.create') }}" style="background-color: #b1b7ba;">
                                        Audio File
                                    </a>

                                    <a href="{{ route('subFolders.create') }}" style="background-color: #b1b7ba;">
                                        Sub Folder
                                    </a>








                                </li>
                            </ul>
                        </li>

                        <li class="dropdown" style="background-color: black;">
                            <a href="#" class="dropdown-toggle" style="color: white" data-toggle="dropdown" role="button" aria-expanded="false">
                                Edit <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu" >
                                <li>
                                    <a href="{{ route('facility.editing.list') }}" style="background-color: #b1b7ba;">
                                        Facility
                                    </a>
                                    <a href="{{ route('announcement.editing.list') }}" style="background-color: #b1b7ba;">
                                        Announcement
                                    </a>
                                    <a href="{{ route('eventTypes.list') }}" style="background-color: #b1b7ba;">
                                        Event Type
                                    </a>
                                    <a href="{{ route('events.list') }}" style="background-color: #b1b7ba;">
                                        Event
                                    </a>
                                    <a href="{{ route('campuses.list') }}" style="background-color: #b1b7ba;">
                                        Campus
                                    </a>

                                    <a href="{{ route('shiftTiming.list') }}" style="background-color: #b1b7ba;">
                                        Shift Timing
                                    </a>

                                    <a href="{{ route('outdoorClass.list') }}" style="background-color: #b1b7ba;">
                                        Outdoor Classes
                                    </a>

                                    <a href="{{ route('aboutus.edit', ['aboutus_id' => 1]) }}" style="background-color: #b1b7ba;">
                                        About Us
                                    </a>

                                    <a href="{{ route('courseType.index') }}" style="background-color: #b1b7ba;">
                                        Course Type
                                    </a>

                                    <a href="{{ route('course.index') }}" style="background-color: #b1b7ba;">
                                        Course
                                    </a>

                                    <a href="{{ route('lectureSchedule.index') }}" style="background-color: #b1b7ba;">
                                        Lecture Schedule
                                    </a>

                                    <a href="{{ route('albums.index') }}" style="background-color: #b1b7ba;">
                                        Gallery Album
                                    </a>

                                    <a href="{{ route('audioFiles.index') }}" style="background-color: #b1b7ba;">
                                        Audio File
                                    </a>








                                </li>
                            </ul>


                        </li>

                        <li class="dropdown" style="background-color: black;">
                            <a href="#" class="dropdown-toggle" style="color: white" data-toggle="dropdown" role="button" aria-expanded="false">
                                View <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu" >
                                <li>
                                    <a href="{{ route('yearlyPlanner.all') }}" style="background-color: #b1b7ba;">
                                        Yearly Planner
                                    </a>

                                    <a href="{{ route('audioFiles.show', ['id' => 5]) }}" style="background-color: #b1b7ba;">
                                        Play Audio File
                                    </a>

                                    <a href="{{ route('photos.show', ['id' => 10]) }}" style="background-color: #b1b7ba;">
                                        Show Photo
                                    </a>

                                </li>
                            </ul>


                        </li>

                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
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
