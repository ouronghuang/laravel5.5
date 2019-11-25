@extends('layouts.app')

@section('title', '登录')

@section('content')
  @component('auth._slot')
    <form method="POST" action="{{ route('login') }}">
      {{ csrf_field() }}
      <div class="form-group">
        <input type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus
               placeholder="邮箱">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="password" required placeholder="密码">
      </div>
      <div class="form-group">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="remember"
                 name="remember" {{ old('remember') ? 'checked' : '' }}>
          <label class="custom-control-label" for="remember">记住我</label>
        </div>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">登录</button>
      </div>
    </form>
  @endcomponent
@endsection
