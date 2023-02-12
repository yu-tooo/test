<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACH TECH(maker)</title>
  <style>
    h2 {
      text-align: center;
    }
    .search {
      width: 80%;
      margin: 0 auto;
      border: 1.2px solid black;
      padding: 10px;
    }
    .search_table {
      border-collapse: separate;
      border-spacing: 20px;
      text-align: left;
    }
    input {
      font-size: 18px;
    }
    .center {
      text-align: center;
    }
    .input_radio {
      margin-right: 10px;
      margin-left: 20px;
      accent-color: black;
      cursor: pointer;
      transform:scale(1.5);
    }
    .result_table {
      border-collapse:collapse;
      margin: 20px auto;
      width: 80%;
      text-align: left;
    }
    .result_table tr {
      border-bottom: 1.2px solid black;
    }
    .result_id {
      width: 5%;
    }
    .result_name {
      width: 11%;
    }
    .result_gender {
      width: 6%;
    }
    .result_email {
      width: 29%;
    }
    .result_opinion {
      width: 43%;
    }
    .result_btn {
      width: 6%;
    }

    .result_table button {
      width :100%;
      background-color: black;
      color: white;
      border-radius: 5px;
    }
  </style>
</head>
<body>
  <h2>@yield('title')</h2>
  <div class="search">@yield('search')</div>
  <div class="result">@yield('result')</div>
</body>
</html>