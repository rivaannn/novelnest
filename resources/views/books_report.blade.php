<!DOCTYPE html>
<html>
  <head>
    <title>Laravel 10 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

  <body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <table class="table table-bordered">
      <tr>
        <th>id</th>
        <th>judul</th>
        <th>harga</th>
        <th>penulis</th>
        <th>penerbit</th>
        <th>kategori</th>
      </tr>
      @foreach($books as $book)
      <tr>
        <td>{{ $book->id }}</td>
        <td>{{ $book->title }}</td>
        <td>{{ 'Rp.'.number_format($book->price,2,',','.') }}</td>
        <td>{{ $book->writter->name }}</td>
        <td>{{ $book->publisher->nama }}</td>
        <td>{{ $book->category->name }}</td>
      </tr>
      @endforeach
    </table>
  </body>
</html>
