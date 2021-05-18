@extends('app.myapp')
@section('content')




			<div class="info" >
				<h1>Hello {{ Auth::user()->name }}</h1>
				<p>your Email is : <strong>{{ Auth::user()->email }}</strong> </p>
				<a class="btn err" href="{{url('logout') }}">Logout</a>

			</div>

@stop