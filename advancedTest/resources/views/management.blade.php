@extends('layouts.maker')

<style>
  .input_date {
    width: 100%;
  }
  .submit {
    text-align: center;
  }
  .submit button {
    cursor: pointer;
      padding: 8px 40px;
      font-size: 14px;
      background-color: black;
      color: white;
      border-radius: 5px;
      box-shadow: 0 0 8px gray;
  }
  .submit a {
    margin: 10px auto;
    width: 80px;
    display: block;
    color: black;
    font-size: 14px;
  }
  svg.w-5.h-5 {
  width: 30px;
  height: 30px;
}
  .opinion p:nth-child(2){
    display: none;
}
.opinion:hover p:nth-child(1) {
  display: none;
}
.opinion:hover p:nth-child(2) {
  display: block;
}
</style>
@section('title', '管理システム')
@section('search')
<form action="/maker" method="POST">
  @csrf
<table class="search_table">
  <tr>
    <th>お名前</th>
    <td><input type="text" name="fullname" value="{{ $fullname }}" ></td>
    <th>性別</th>
    <?php
      $o = $m = $w = null;
      switch($gender) {
        case 0:
          $o = 'checked';
          break;
        case 1:
          $m = 'checked';
          break;
        case 2:
          $w = 'checked';
          break;
      }
    ?>
    <td>
      <input class="input_radio" type="radio" name="gender" value=0 <?php echo $o ?>>全て
      <input class="input_radio" type="radio" name="gender" value=1 <?php echo $m ?>>男性
      <input class="input_radio" type="radio" name="gender" value=2 <?php echo $w ?>>女性
    </td>
  </tr>
  <tr>
    <th>登録日</th>
    <td><input type="date" class="input_date" name="created_start" value="{{$created_start}}"></td>
    <td class= "center">~</td>
    <td><input type="date" class="input_date" name="created_end" value="{{$created_end}}"></td>
  </tr>
  <tr>
    <th>メールアドレス</th>
    <td><input type="text" name="email" value="{{$email}}"></td>
  </tr>
</table>
<div class="submit">
  <button>検索</button>
</form>
  <a href="/maker">リセット</a>
</div>
@endsection
@section('result')
@isset($users)
  {{$users->links('vendor.pagination.tailwind')}}
@endisset
<table class="result_table">
  <tr class="result_header">
    <th class="result_id">ID</th>
    <th class="result_name">お名前</th>
    <th class="result_gender">性別</th>
    <th class="result_email">メールアドレス</th>
    <th class="result_opinion">ご意見</th>
    <th class="result_btn"></th>
  </tr>

  @isset($users)
  
  @foreach($users as $user)
  <tr>
    <td>{{ $user->id }}</td>
    <td>{{ $user->fullname }}</td>
    @if ($user->gender == 1)
    <td>男性</td>
    @else
    <td>女性</td>
    @endif
    <td>{{ $user->email }}</td>
    <td class="opinion">
      <p>{{ Str::limit($user->opinion, 50)}}</p>
      <p>{{ $user->opinion }}</p>
    </td>
    <form action="/delete?id={{ $user->id }}" method="POST">
      @csrf
      <td><button>削除</button></td>
    </form>
  </tr>
  @endforeach
  @endisset
</table>
@endsection