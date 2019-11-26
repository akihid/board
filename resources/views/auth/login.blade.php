@extends('layouts.common')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-12">
        <div class="card">
          <div class="card-header"> {{ __('Login') }}</div>
          <article class="card-body">      
            <p><a href="{{ route('twitter.login') }}" class="btn btn-block btn-outline-info"> <i class="fab fa-twitter"></i> Twitterでログイン</a></p>
            <hr>
            <form method="POST" action="{{ route('login') }}">
            @csrf
              <div class="form-group">
                <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">
                  {{ __('Login') }}
                </button>
              </div>
            </form>  

            <form class="mx-auto mb-3" action="{{ route('login') }}" method="POST">
              @csrf
              <input type="hidden" id="email" name="email" value="test@co.jp">
              <input type="hidden" id="password" name="password" value="password">
              <input type="submit" class="btn btn-secondary btn-block" value="テストユーザーでログイン">
            </form>
            <p class="text-center"><a href="{{ route('register') }}" class="small">アカウントをお持ちでないですか？会員登録はこちら</a></p>   
          </article>
        </div>
      </div>
    </div>
</div>
@endsection
