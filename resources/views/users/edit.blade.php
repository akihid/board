@extends('layouts.common')
@section('content')

@include('errors.form_errors')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">ユーザー情報の更新</div>
          <div class="card-body">
            <form method="POST" action="{{ route('users.update', ['user' => Auth::user()]) }}" enctype="multipart/form-data">
              @csrf
              @method('PATCH')

              <div class="mb-1">
                @if(!empty($user->avator_url))
                  <img class="avator_img_def d-block mx-auto" src="{{ asset('/storage/avator_images/'.$user->avator_url) }}">
                @else
                  <img class="avator_img_def d-block mx-auto" src="/images/default.jpeg" alt="アバター画像">
                @endif
              </div>

              <div class="form-group row">
                <input type="file" id="user-avator_url" name="avator_url" class="form-control">
              </div>

              <label for="name" class="col-form-label text-md-right">名前</label>
              <div class="form-group row">
                <input type="text" class="form-control m-1" name="name" value="{{ old('name', $user->name) }}">
              </div>

              <label for="email" class="col-form-label text-md-right">メールアドレス</label>
              <div class="form-group row">
                <input type="text" class="form-control m-1" name="email" value="{{ old('email', $user->email) }}">
              </div>

              <label for="detail" class="col-form-label text-md-right">紹介文</label>
              <div class="form-group row">
                <textarea name="detail" id="user-detail" cols="30" rows="5" class="form-control">{{ old('detail', $user->detail) }}</textarea>
                <!-- <input type="text" class="form-control m-1" id="user-detail" name="detail" value="{{ old('detail', $user->detail) }}"> -->
              </div>
              <div class="form-group row">
              <input type="submit" class="btn btn-primary d-block mx-auto" value="更新">
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection