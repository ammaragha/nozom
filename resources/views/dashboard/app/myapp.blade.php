<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="{{ url('dashboard/css/bootstrap.css') }}"> 
        <link rel="stylesheet" href="{{ url('dashboard/css/jquery-confirm.min.css') }}">   	
        <link rel="stylesheet" href="{{ url('dashboard/css/main.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>
    <body>

    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-2 sideBar">
    				<div class="d-grid gap-2 btnCenter">
					  <a href="{{ url('/dash') }}"class="btn  myBtn @if(isset($data)) disabled @endif" type="button">Users</a>
					  <a href="{{ url('logout') }}" class="btn btn-danger" type="button">Logout</a>
					</div>
    			</div>
    			


                    <div class="offset-2 col-10 pt-5">

                        @yield('content')
                    </div>


    		</div>
		</div>





    	

    	  <script src="{{ url('auth/js/jquery.js') }}"></script>
    	  <script src="{{ url('dashboard/js/bootstrap.js') }}"></script> 
          <script src="{{ url('dashboard/js/jquery-confirm.min.js') }}"></script>  	  
          <Script src="{{ url('dashboard/js/main.js') }}"></Script>
    </body>
</html>