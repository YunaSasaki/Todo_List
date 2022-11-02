<!DOCTYPE html>

<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo List</title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;700&family=Vollkorn:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
  <div class=container>
    <div class=card>
      <p class=title>Todo List</p>
      @if (count($errors) > 0)
      <ul>
        @foreach ($errors->all() as $error)
        <li>
          {{$error}}
        </li>
        @endforeach
      </ul>
      @endif
      <form method="POST">
        @csrf
        <div class=create>
          <input class="create-name" type="text" name="name" maxlength="20">
          <button class="create-btn" formaction="/create" type="submit">追加</button>
        </div>
      </form>
      <table>
        <tr>
          <th></th>
          <th>作成日</th>
          <th>タスク名</th>
          <th>更新</th>
          <th>削除</th>
        </tr>
        @foreach ($todos as $todo)
        <form method="POST">
          @csrf
          <tr>
            <td>
              <input type="hidden" name="id" value="{{$todo->id}}">
            </td>
            <td>
              {{$todo->created_at}}
            </td>
            <td>
              <input class=update-name type="text" name="name" maxlength="20" value="{{$todo->name}}">
            </td>
            <td>
              <button class="update-btn" formaction="/update" type="submit">更新</button>
            </td>
            <td>
              <button class="delete-btn" formaction="/delete" type="submit">削除</button>
            </td>
          </tr>
        </form>
        @endforeach
      </table>
    </div>
  </div>
</body>

</html>