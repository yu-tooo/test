@extends('layouts.customer')

<style>
  table {
    border-collapse: separate;
    border-spacing: 20px;
  }
  .revise_btn {
    cursor: pointer;
    margin: 10px;
    border: none;
    border-bottom: 1px solid black;
    background-color: white;
  }
</style>
@section('title', '内容確認')

@section('content')

<table> 
  <tr>
    <th>お名前</span></th>
    <td>{{ $user['fullname'] }}</td>
  </tr>
  <tr>
    <th>性別</th>
    @if ($user['gender'] == 1)
    <td>男性</td>
    @else
    <td>女性</td>
    @endif
  </tr>
  <tr>
    <th>メールアドレス</th>
    <td>{{ $user['email'] }}</td>
  </tr>
  <tr>
    <th>郵便番号</th>
    <td>{{ $user['postcode'] }}</td>
  </tr>
  <tr>
    <th>住所</th>
    <td>{{ $user['address'] }}</td>
  </tr>
  <tr>
    <th>建物名</th>
    <td>{{ $user['building_name'] }}</td>
  </tr>
  <tr>
    <th>ご意見</th>
    <td>{{ $user['opinion'] }}</td>
  </tr>
</table>
<form action="/thanks" method="POST">
  @csrf
  <input type="hidden" name="fullname" value="{{$user['fullname']}}">
  <input type="hidden" name="gender" value="{{$user['gender']}}">
  <input type="hidden" name="email" value="{{$user['email']}}">
  <input type="hidden" name="postcode" value="{{$user['postcode']}}">
  <input type="hidden" name="address" value="{{$user['address']}}">
  <input type="hidden" name="building_name" value="{{$user['building_name']}}">
  <input type="hidden" name="opinion" value="{{$user['opinion']}}">
  <div class="submit"><button>送信</button>
</form>
<form action="/" method="POST">
  @csrf
  <input type="hidden" name="fullname" value="{{$user['fullname']}}">
  <input type="hidden" name="gender" value="{{$user['gender']}}">
  <input type="hidden" name="email" value="{{$user['email']}}">
  <input type="hidden" name="postcode" value="{{$user['postcode']}}">
  <input type="hidden" name="address" value="{{$user['address']}}">
  <input type="hidden" name="building_name" value="{{$user['building_name']}}">
  <input type="hidden" name="opinion" value="{{$user['opinion']}}">
  <input type="submit" class="revise_btn" value="修正する">
</form>


</div>
@endsection
