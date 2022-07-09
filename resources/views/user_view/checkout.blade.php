<html>

<head>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <title>Landing Page</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('layout')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .container{
        margin-top: 70px;
      }
      
      input[type="date"] {
        position: relative;
      }

      input[type="date"]::-webkit-calendar-picker-indicator {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: auto;
        height: auto;
        color: transparent;
        background: transparent;
      }
    </style>
  </head>
  <body>
    <div class="container center">
    <table class="table">
      <thead>
        <tr>
          <th>Harga Wisata</th>
          <th>Harga Fasilitas</th>
          <th>Tagihan</th>
        </tr>
      </thead>
      <tbody>
        @foreach($transaksi as $t)
        <tr>
          <td>{{$t->trans->wisata_id}}</td>
          <td>{{$t->fasilitas_id}}</td>
          <td>{{$t->trans->tagihan}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  </body>
</html>