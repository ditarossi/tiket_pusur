<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pemesanan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="forms-sample" action="{{ url('pemesanan') }}" method="post">
          @csrf
            <div class="mb-3">
              <label>Nama Wisata</label>
              <input name="jumlah" type="text" class="form-control" id="jumlah" value="{{$value}}"></input>
            </div>
            <div class="mb-3">
              <label>Fasilitas</label>
              <br>
              @foreach ($datas as $d)
                <input name="fasilitas_id[]" class="form-check-input" type="text" id="inlineCheckbox1" value="{{ $d->fasilitas_id }}">
              @endforeach
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
          </form>
        </div>
      </div>
    </div>
  </div>