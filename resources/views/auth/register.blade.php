@extends('layouts.common')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-8 col-md-12">
      <div class="card">
        <div class="card-header">{{ __('Register') }}</div>
        <article class="card-body">
          <p><a href="{{ route('twitter.login') }}" class="btn btn-block btn-outline-info"> <i class="fab fa-twitter"></i> Twitterで登録</a></p>
          <hr>

          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
              <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
              @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
            </div>      
          </form>
          <p class="text-center"><a href="{{ route('login') }}" class="small">アカウントをお持ちですか？ログインはこちら</a></p>   
        </article>
      </div>
    </div>
  </div>
</div>
@endsection
