<!DOCTYPE html>

<html lang="en">

    <head>

        <title>CollectionHub</title>
        <link rel="shortcut icon" href="img/icon.png" type="image/x-icon" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="main.css"> -->

        <style>
            <?php require "styles/main.css" ?> 
            /* using php to connect to a css file */
        </style>
      
    </head>
    
    <body>

    <div class="main">
        <nav class="navbar navbar-expand-md">
            <img class="navbar-brand" src="img/logo.png" alt="logo">
            <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main-navigation">
                <ul class="navbar-nav">
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <li class="nav-item">
                        <div id="avatar"></div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

        

        <header class="page-header header container-fluid">

            <div class="overlay"></div> <!--this is the fading color overlay for the background image-->

            <!--this is the main text at the center of the page-->
            <div class="description">
                <h1>Welcome to CollectionHub!</h1><br><br>
                <a href="register/" class="btn btn-outline-secondary btn-lg" role="button" >Sign up to create your first Collection!</a> <!--THIS LINKS TO THE register PAGE-->
                <a href="login/" class="btn btn-outline-secondary btn-lg" role="button" >Already have an account? Login here!</a> <!--THIS LINKS TO THE login PAGE-->
            </div> 

        </header>


        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


        
    </body>
    
</html>