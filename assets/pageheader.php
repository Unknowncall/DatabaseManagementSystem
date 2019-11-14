<!DOCTYPE html>
<html>
<head>
    <title>Airport Database</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="https://bootswatch.com/4/darkly/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/09e46c79f6.js"></script>
    <style>
        th{
            text-decoration: underline;
        }
        .directionsContainer{
            width:380px;
            height:600px;
            overflow-y: auto;
            float:left;
            background-color: white;
            margin-bottom: 20px;
        }

        #map{
            position:relative;
            width:calc(100% - 380px);
            height:600px;
            float:left;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="index.php"><i class="fas fa-plane-departure" style="padding-right:5px;"></i>Airport Database</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Search</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class='dropdown-item' href='index.php?mode=airportsearch'>Airports</a>
                                <a class='dropdown-item' href='index.php?mode=airlinesearch'>Airlines</a>
                                <a class='dropdown-item' href='index.php?mode=airplanesearch'>Airplanes</a>
                                <a class='dropdown-item' href='index.php?mode=routesearch'>Routes</a>
                           </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Modify Data</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class='dropdown-item' href='index.php?mode=airportmodify'>Airports</a>
                                <a class='dropdown-item' href='index.php?mode=airlinemodify'>Airlines</a>
                                <a class='dropdown-item' href='index.php?mode=planemodify'>Airplanes</a>
                                <a class='dropdown-item' href='index.php?mode=routemodify'>Routes</a>
                           </div>
                        </li>
                        <?php if(isset($_SESSION['user'])){ ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?mode=profilepage">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?mode=logout">Log Out</a>
                        </li>
                    </ul>
                    <?php }else{ ?>
                    </ul>       
                    <form class="form-inline my-2 my-lg-0" action="index.php?mode=login" method="post">
                        <input class="form-control mr-sm-2" type="text" name="username" placeholder="Username">
                        <input class="form-control mr-sm-2" type="password" name="password" placeholder="Password">
                        <button class="btn btn-success my-2 my-sm-0" type="submit">Login</button>
                    </form>
                    <form action="index.php?mode=signup" method="post">
                        <div style="padding-left: 3px;">
                            <button class="btn btn-secondary" type="submit">Sign Up</button>
                        </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </nav>
    </header>