@isset ($user->avator_url)
  <img src="{{ $user->avator_url }}" alt="アバター画像">
@else
  <img  src="/images/default.jpeg" alt="アバター画像">
@endisset