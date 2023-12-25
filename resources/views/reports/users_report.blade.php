<!DOCTYPE html>
<html>
  <head>
    <title>Novelnest - User Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

  <body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <table class="table table-bordered">
      <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Akun google</th>
      </tr>
      @foreach($users as $user)
      <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ ($user->google_id == null) ? "Tidak memakai akun google" : "Tertaut akun google" }}</td>
      </tr>
      @endforeach
    </table>
  </body>
</html>
