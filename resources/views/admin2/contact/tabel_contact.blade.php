@extends('admin2.v_template')
@section('title')
<title>Tabel Contact</title>
@endsection

@section('content')
<!-- partial -->
<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Data Contact</h4>
              <div class="row">
                <div class="col-12"></div>
                  <div class="table-responsive">
                    <br>
                    <br>
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Nama User</th>
                            <th>E-Mail</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Message</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($datas as $value)
                        <tr>
                            <td>
                              {{ $value->name }}
                            </td>
                            <td>
                              {{ $value->email }}
                            </td>
                            <td>{{ $value->phone }}</td>
                            <td>{{ $value->subject }}</td>
                            <td>{{ $value->message }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection