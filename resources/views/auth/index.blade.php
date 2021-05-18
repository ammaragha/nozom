@extends('app.myapp')

@section('content')
        <div class="login-page">
            <div class="form">
              {{ Form::Open(['class'=>'register-form', 'METHOD'=>'Post', 'url'=>'sign']) }}
                <input type="text" placeholder="name" name="username" required/>
                <input type="password" placeholder="password" name="password" pattern=".{4,20}" required id="pass"/>
                <input type="password" placeholder="Re-password" name="rePassword" pattern=".{4,20}" required id="rePass"/>
                <p id="match"></p>
                <input type="text" placeholder="email address" name="email" required/>
                <button>create</button>
                <p class="message">Already registered? <a href="#">Sign In</a></p>
              {{  Form::Close()  }}


              {{Form::Open(['class'=>'login-form',  'METHOD'=>'Post', 'url'=>'login']) }}
                <input type="email" placeholder="email" name="email"/>
                <input type="password" placeholder="password" name="password"/>
                <button>login</button>
                <p class="message">Not registered? <a href="#">Create an account</a></p>
              {{Form::Close()}}


              @if(isset($errors))
                @foreach($errors->all() as $err)
                  <div class="err section">
                    <p>{{$err}}</p>
                  </div>
                @endforeach
              @endif


              @if(Session::has('scc'))
                <div class="scc section">
                  <p>{{Session::get('scc')}}</p>
                </div>
              @endif

              @if(Session::has('err'))
                <div class="err section">
                  <p>{{Session::get('err')}}</p>
                </div>
              @endif
            </div>
            

            
          </div>
@stop

        

        