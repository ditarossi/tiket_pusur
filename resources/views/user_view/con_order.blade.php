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
      .container .card-body h5{
        font-weight: 700;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
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
  @include('sweetalert::alert')
  <div class="container">


    <div class="card mb-3" style="max-width: 1300px; border: 0px;">
      <div class="row g-0">
        <a type="button" href="{{url('user_view')}}" class="btn btn-light"><i class="ti ti-arrow-left"></i> Back</a>
        <div class="col-md-4">
          <img src="{{asset('pict')}}/assets/img/features-3.svg" class="img-fluid rounded-start" alt="..." width="750px">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title" align="center">Form Pemesanan</h5>
                  {{-- FORM ORDER --}}
                  <form class="forms-sample" action="{{ url('pemesanan') }}" method="post">
                    @foreach($data_tr as $value)
                  <div class="mb-3">
                    <label>Nama Wisata</label>
                    <select name="wisata_id" data-dependent="fasilitas_id" class="form-control input-lg dynamic" id="wisata_id" placeholder="Nama Wisata" required>
                      <option value="{{ $value->wisata_id }}">{{ $value->wisata->nama_wisata }}</option>
                      @foreach($wisata_list as $wis)
                            <option value="{{ $wis->wisata_id }}">{{ $wis->wisata->nama_wisata }}</option>
                    @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label>Tanggal Kunjungan</label>
                    <input value="{{$value->Tanggal_Kunjungan}}" name="Tanggal_Kunjungan" type="date" class="form-control" id="Tanggal_Kunjungan" required></input>
                  </div>
                  <div class="mb-3">
                    <label>Jam Kunjungan</label>
                    <input value="{{$value->jam}}" name="jam" class="form-control input-lg dynamic" placeholder="Jam Kunjungan" required>
                  </div>
                  @endforeach
                  <div class="mb-3">
                    <label>Fasilitas Wisata</label>
                    <select name="fasilitas_id[]" data-dependent="tagihan" class="form-control input-lg dynamic js-example-basic-single" id="fasilitas_id" multiple="multiple" placeholder="Fasilitas Wisata" required>
                      <option value=""> -- Pilih --</option>
                    </select>
                  </div>
                  @if(session()->has('Success'))
                  <div class="alert alert-success" role="alert">
                    {{session('Success')}}
                  </div>
                  @endif
                  <div class="mb-3">
                    <label>Jumlah</label>
                    <input name="jumlah" type="number" min="0" class="form-control" id="jumlah" oninput="myFunction()" required></input>
                  </div>
                  <div class="mb-3">
                    <label>Tagihan</label>
                    <input value="tagihan" name="tagihan" type="text" class="form-control" id="tagihan" readonly></input>
                  </div>

                        <a href="{{url('user_view')}}" type="button" class="btn btn-secondary">Close</a>
                        <button type="submit" name="submit" class="btn btn-primary">Order Now</button>

              {{-- @foreach ($wisata_list as $wis)
                          @if($wis->wisata->kuota == 0 )
                            <div class="alert alert-danger" role="alert">
                      A simple danger alert—check it out!
                      <div class="modal-footer">
                      <a href="{{url('user_view')}}" type="button" class="btn btn-secondary">Close</a>
                    </div>
                    </div>
                    @endif
                    @endforeach --}}
                    {{-- <div class="modal-footer">
                      <a href="{{url('user_view')}}" type="button" class="btn btn-secondary">Close</a>
                    </div> --}}
                    
                    {{-- @if($wisata_list->count())
                      @if($wis->wisata->kuota < 0 ) --}}
                      {{-- <div class="modal-footer">
                        <a href="{{url('user_view')}}" type="button" class="btn btn-secondary">Close</a>
                        <button type="submit" class="btn btn-primary">Send message</button>
                      </div> --}}
                      {{-- @elseif($wis->wisata->kuota > 0 )
                      <div class="modal-footer">
                        <a href="{{url('user_view')}}" type="button" class="btn btn-secondary">Close</a>
                        <button type="submit" class="btn btn-primary">Send message</button>
                      </div>
                      @else
                      kosong
                      @endif --}}
                        {{-- <div class="modal-footer">
                        <a href="{{url('user_view')}}" type="button" class="btn btn-secondary">Close</a>
                        <button type="submit" class="btn btn-primary">Send message</button>
                      </div> --}}
                    {{-- @endif --}}
                  {{ csrf_field() }}
                </form>
          </div>
        </div>
      </div>
    </div>


</body>

<script>
  let harga_wisata, total_sementara;
  $(document).ready(function() {
    $('#wisata_id').change(function() {
      if ($(this).val() != '') {
        var select = $(this).attr("id");
        var value = $(this).val();
        var dependent = $(this).data('dependent');
        var _token = $('input[name="_token"]').val();

        console.log(select, value);

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
        $.ajax({
          url:"{{route('order.detail')}}",
          method: "post", 
          data: {
            value: value,
            _token: _token,
          },
          success: function(result) {
            // $('#' + dependent).html(result);
            console.log(result);
            document.getElementById("tagihan").value = result;
            harga_wisata = result;
          }
        })
      }
    });
  });


  $(document).ready(function() {
    $('#fasilitas_id').change(function() {
      if ($(this).val() != '') {
        var select = $(this).attr("id");
        var value = $(this).val();
        var dependent = $(this).data('dependent');
        var _token = $('input[name="_token"]').val();

        console.log(select, value);

        $.ajax({
          url:"{{route('order.fasilitas')}}",
          method: "post", 
          data: {
            value: value,
            _token: _token,
          },
          success: function(result) {
            // $('#' + dependent).html(result);
            // console.log(result);
            // document.getElementById("tagihan").value = result;
            let sum = result.reduce(function (previousValue, currentValue) {
                return previousValue + parseInt(currentValue.harga)
            }, 0)
            //console.log(sum);
            // let totalawal = document.getElementById("tagihan").value;
            let totalakhir = sum+parseInt(harga_wisata);
            document.getElementById("tagihan").value = totalakhir;
            total_sementara = totalakhir;
          }
        })
      }
    });
  });

  function myFunction() {
  var x = document.getElementById("jumlah").value;
  //document.getElementById("demo").innerHTML = "You wrote: " + x;
  console.log(x);
  let total_final = parseInt(total_sementara) * parseInt(x);
  document.getElementById("tagihan").value = total_final;
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
      $('.js-example-basic-single').select2();
    });
</script>

</html>