@extends('layouts.master')

@section('title')
    Welcome!
@endsection


@section('main-content')
<div class="container">
    @if (count($errors) > 0)
        <div class="row">
            <div class="col-md-4 col-md-offset-4 alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif 
    @if(Session::has('message'))
        <div class="row">
            <div class="col-md-4 col-md-offset-4 alert alert-danger">
                {{ Session::get('message') }}
            </div>
        </div>
    @endif
      <form class="login-form" action="{{ route('signin') }}" method="post">        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group {{ $errors->has('email') ? 'has-error' : '' }}">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" class="form-control" placeholder="email" name="email" id="email" value="{{ Request::old('email') }}"  autofocus>
            </div>
            <div class="input-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" placeholder="Password" name="password" id="password" autofocus>
            </div>
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
            </label>
            <input type="hidden" name="_token" value="{{ Session::token() }}" />
            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
        </div>
      </form>
</div>
@endsection
