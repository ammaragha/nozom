@extends('dashboard.app.myapp')
@section('content')


			<div class="row">
				<!-- Start Search -->
				<div class="col-5">
					{{ Form::Open(['url'=>'/dash','method'=>'get']) }}
						<input type="text" class="form-control" placeholder="search.." name="search"
						value="@if( isset($_GET['search']) ){{$_GET['search']}}@endif">
					{{ Form::Close() }}

					</form>
				</div>
				<!-- End Search -->
				<!-- start add user -->
				<div class="offset-5 col-2 float-end"> 
					<a href="{{ url('/dash/addUser') }}" class=" w-100 btn btn-primary"> Add user</a>
				</div> 
			</div>
			<hr>	

			<!-- Start count users -->
			<div class="m-2" >
				Count [{{ count(isset($data) && !is_null($data) ? $data : [] ) }}]
			</div>



			<!-- Error section -->
			@if(Session::has('k'))
			<div class="m-3 alert alert-success">
				{{ Session::get('k') }}
			</div>
			@elseif(Session::has('err'))
			<div class="m-3 alert alert-danger">
				{{ Session::get('err') }}
			</div>
			@endif
			<!-- end error section -->

			<!-- Start table -->
			<div class="shadow-lg p-3 mb-5 bg-body rounded  mt-2" >
				<table class="table table-responsive table-hover">
				  <thead class="table-dark">
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Name</th>
				      <th scope="col">Email</th>
				      <th scope="col">Actions</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@if(isset($data) && count($data)>0)
					  	@foreach($data as $key=>$user)
					    <tr>
					      <th scope="row">{{ $num= $key+1 }}</th>
					      <td>{{ $user['name']}}</td>
					      <td>{{ $user['email']}}</td>
					      <td>
					      	{{ Form::Open(['class'=>'myForm','url'=>'dash/delUser/'.$user["id"],'METHOD'=>'POST']) }}
					      		@if($user['role'] == 0)
					      		<input type="submit" class="btn btn-danger confirm" id="confirm" value="Delete">
					      		@endif
						      	<a class="btn btn-primary .confirm" href="{{ url('/dash/editUser/'.$user['id']) }}">Edit</a>

					      	{{ Form::Close() }}
					      </td>
					    </tr>
					    @endforeach
				    @else
				    	<tr>
				    		<td colspan="4" class="text-center">No data</td>
			    		</tr>
			    	@endif
					  </tbody>
				</table>
			</div>


@stop