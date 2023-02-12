@extends('layouts.customer')

@section('title', 'お問い合わせ')
<style>
  .error_message {
    color: red;
  }
</style>
@section('content')
<form action="/confirm" method="POST">
@csrf
<table> 
  <tr>
    <th>お名前<span class='red'> ※</span></th>
    <td><input type="text" name='lastName' value="{{$user['lastName']}}" >
      <input type="text" name="firstName" value="{{$user['firstName']}}" >
    </td>
  </tr>
  @if($errors->has('firstName') || $errors->has('lastName'))
  <tr><th></th><td class="error_message">フルネームを入力してください</td></tr>
  @endif
  <tr>
    <th></th>
    <td class="example">例）山田 <span class="last_name">例）太郎</span></td>
  </tr>
  <tr>
    <th>性別<span class='red'> ※</span></th>
    @if ($user['gender'] == 2)
    <td>
      <input class="input_radio" type="radio" name="gender" value=1>男性
      <input class="input_radio" type="radio" name="gender" value=2 checked='checked'>女性
    </td>
    @else
    <td><input class="input_radio" type="radio" name="gender" value=1 checked='checked'>男性
    <input type="radio" class="input_radio" name="gender" value=2>女性</td>
    @endif
  </tr>
  <tr><th></th><td></td></tr>
  <tr>
    <th>メールアドレス<span class='red'> ※</span></th>
    <td>
      <input class="input_text" type="email" name="email" value="{{$user['email']}}" >
    </td>
  </tr>
  @error('email')
  <tr><th></th><td class="error_message">{{ $message }}</td></tr>
  @enderror
  <tr><th></th><td class="example">例）test@example.com</td></tr>
  <tr>
    <th>郵便番号<span class='red'> ※</span></th>
    <td>
      <input type="text" class="input_text" name="postcode" value="{{$user['postcode']}}" onKeyUp="AjaxZip3.zip2addr('postcode', '', 'address', 'address');" >
    </td>
  </tr>
  @error('postcode')
  <tr><th></th><td class="error_message">{{ $message }}</td></tr>
  @enderror
  <tr><th></th><td class="example">例）123-4567</td></tr>
  <tr>
    <th>住所<span class='red'> ※</span></th>
    <td>
      <input type="text" class="input_text" name="address" value="{{$user['address']}}" >
    </td>
  </tr>
  @error('address')
  <tr><th></th><td class="error_message">{{ $message }}</td></tr>
  @enderror
  <tr><th></th><td class="example">例）東京都渋谷区千駄ヶ谷1-2-3</td></tr>
  <tr>
    <th>建物名</th>
    <td>
      <input type="text" class="input_text" name="building_name" value="{{$user['building_name']}}">
    </td>
  </tr>
  <tr><th></th><td class="example">例）千駄ヶ谷マンション101</td></tr>
  <tr>
    <th>ご意見<span class='red'>※</span></th>
    <td>
      <textarea name="opinion" class="input_text" cols="30" rows="5" >{{ $user['opinion'] }}</textarea>
    </td>
  </tr>
  @error('opinion')
  <tr><th></th><td class="error_message">{{ $message }}</td></tr>
  @enderror
</table>
<div class="submit"><button>確認</button>
</div>
</form>

@endsection
