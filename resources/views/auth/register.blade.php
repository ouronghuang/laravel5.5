@extends('layouts.app')

@section('title', '注册')

@section('content')
  @component('auth._slot')
    <form method="POST" action="{{ route('register') }}">
      {{ csrf_field() }}
      <div class="form-group">
        <input type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus
               placeholder="用户名">
      </div>
      <div class="form-group">
        <input type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="邮箱">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="password" required placeholder="密码">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="password_confirmation" required placeholder="确认密码">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">注册</button>
      </div>
    </form>
  @endcomponent
@endsection
