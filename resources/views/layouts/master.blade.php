<!DOCTYPE html>
<html lang="en">
	<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	  <title>I love movies</title>
	  
	  <link rel="shortcut icon" type="image/jpg" href="{{ asset('img/play.jpg') }}"/>

	  <!-- Bootstrap -->
	  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
	
	  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		  <![endif]-->
    </head>
    <body>
      <div class="container">
		@include('layouts.nav')
        <div class="jumbotron">
		  @if(Session::has('success'))
		  <div class="alert alert-success">
		  {{ Session::get('success')}}
		  </div>
		  @endif	  
		  
          @yield('header')		  
        </div>
		
        <div class="row">
          <article class="col-md-9">
            @yield('contenu')            
          </article>
		  
          <aside class="col-md-3">
			@yield('aside')
          </aside>
        </div>
      </div>

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    </body>
    </html>