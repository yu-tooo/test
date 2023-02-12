<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACH TECH</title>
  <style>
    h2 {
      text-align:center;
    }
    table {
      margin: 0 auto;
      text-align: left;
    }
    table th {
      padding-right: 50px;
    }
    table td input{
      margin-right: 15px;
    }
    textarea {
      resize: none;
    }
    span.red {
    color: red;
    font-size: 14px;
    }
    .input_radio {
      accent-color: black;
      cursor: pointer;
      transform:scale(1.25);
      margin-left: 10px;
      margin-right: 5px;
    }
    .example {
      font-size: 12px;
      padding-left: 10px;
      opacity: 0.5;
    }
    .last_name{
      margin-left: 135px;
    }
    .input_text {
      width: 95%
    }
    .submit {
    text-align:center;
    margin-top: 40px;
    }
    .submit button {
      cursor: pointer;
      padding: 10px 40px;
      font-size: 18px;
      background-color: black;
      color: white;
      border-radius: 5px;
      box-shadow: 0 0 8px gray;
    }
  </style>
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
</head>
<body>
  <h2>@yield('title')</h2>
  <dev class="content">
    @yield('content')
  </dev>
</body>
</html>