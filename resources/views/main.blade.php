<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>라라벨 Todo List 만들기</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    </head>
    <body>
        <form method="post" action="/todo">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <label>할일</label>
          <input type="text" name="title"/>
          <input type="submit">
        </form>
        @foreach ($todos as $todo)
          <!-- <p>{{$todo->title}}</p> -->
          <p>
            @if ($todo->done == 1)
              <span style="text-decoration: line-through">
            @endif
              {{$todo['title']}}
            @if ($todo->done == 1)
              </span>
            @endif
            <form action="/todo/done/{{$todo->id}}" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="submit" value="<?php echo $todo->done == 0?"완료":"취소" ?>">
            </form>
            <form action="/todo/{{$todo->id}}" method="post">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="submit" value="삭제">
            </form>
          </p>
        @endforeach
    </body>
</html>
