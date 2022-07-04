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
  <form class="forms-sample" action="{{ url('pemesanan') }}" method="post">
    @csrf
    <div class="mb-3">
      <label>Nama Wisata</label>
      <select name="nama_wisata" data-dependent="fasilitas" class="form-control input-lg dynamic" id="nama_wisata" placeholder="Nama Wisata">
        <option value=""> -- Pilih --</option>
        @foreach ($wisata_list as $wis)
        <option value="{{ $wis->nama_wisata }}">{{ $wis->nama_wisata }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label>Fasilitas Wisata</label>
      <select name="fasilitas[]" class="form-control input-lg dynamic js-example-basic-single" id="fasilitas" multiple="multiple" placeholder="Fasilitas Wisata">
        <option value=""> -- Pilih --</option>
      </select>
    </div>
    <div class="mb-3">
      <label>Tanggal Kunjungan</label>
      <input name="Tanggal_Kunjungan" type="date" class="form-control" id="Tanggal_Kunjungan"></input>
    </div>
    <div class="mb-3">
      <label>Jumlah</label>
      <input name="jumlah" type="text" class="form-control" id="jumlah"></input>
    </div>
    <div class="mb-3">
      <label>Tagihan</label>
      <input value="" name="tagihan" type="text" class="form-control" id="tagihan"></input>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Send message</button>
    </div>
    {{ csrf_field() }}
  </form>
</body>
<script>
  $(document).ready(function() {
    $('#nama_wisata').change(function() {
      if ($(this).val() != '') {
        var select = $(this).attr("id");
        var value = $(this).val();
        var dependent = $(this).data('dependent');
        var _token = $('input[name="_token"]').val();

        $.ajax({
          url: "{{ route('order.fetch') }}",
          method: "POST",
          data: {
            select: select,
            value: value,
            _token: _token,
            dependent: dependent
          },
          success: function(result) {
            $('#' + dependent).html(result);
          }
        })
      }
    });
    $('#nama_wisata').change(function() {
      $('#fasilitas').val('');
    });
  });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>

</html>