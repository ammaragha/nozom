@extends('dashboard.app.myapp')

@section('content')



	<div class="shadow-lg p-3 mb-5 bg-body rounded  mt-2 row " >
		<h2 class="fw-bold text-capitalize m-2 text-center">add new user</h2>
		{{ Form::Open(['class'=>'form-group col-4 offset-4 mt-4','url'=>'/dash/doAddUser','METHOD'=>'POST']) }}
        	<div class="m-3">
				<input type="text" placeholder="name" name="username" class="form-control" required/>
			</div>
        	<div class="m-3">
        		<input type="password" placeholder="password" name="password" pattern=".{4,20}" class="form-control" required id="pass"/>
        	</div>

        	<div class="m-3">
            	<input type="password" placeholder="Re-password" name="rePassword" pattern=".{4,20}" class="form-control" required id="rePass"/>
            </div>
            <p id="match" class="badge rounded-pill bg-warning text-dark"></p>

        	<div class="m-3">
            	<input type="text" placeholder="email address" name="email" class="form-control"  required/>
            </div>
            <div class="m-3 text-center">
  				<button type="submit" class="w-100 btn btn-primary ">Submit</button>
			</div>

		{{ Form::Close() }}

		 @if(isset($errors))
                @foreach($errors->all() as $err)
                  <div class="alert alert-danger">
                    <p>{{$err}}</p>
                  </div>
                @endforeach
              @endif


              @if(Session::has('scc'))
                <div class="alert alert-success">
                  <p>{{Session::get('scc')}}</p>
                </div>
              @endif

              @if(Session::has('err'))
                <div class="alert alert-danger">
                  <p>{{Session::get('err')}}</p>
                </div>
              @endif
	</div>




@stop