@extends('backend/admin/layouts/template')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Player</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('dataplayer.store')}}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="card-body">
                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <strong>Whoops!</strong> There were some problems with your input. <br><br>
                      <ul>
                          @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                  @endif
                  <div class="row">
                    <label for="exampleInputGame1">Pilih Game</label>
                    <select name="id_game" class="form-control" required>
                      @foreach ($datagame as $game)
                        <option value="{{$game->id_game}}">{{$game->nama_game}}</option>
                      @endforeach 
                    </select>
                  </div>
                  <div class="row">
                    <div class="col-5">
                      <label for="exampleInputEmail">Email</label>
                      <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Email">
                    </div>
                    <div class="col-7">
                      <label for="exampleInputNama">Nama Lengkap</label>
                      <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Nama Lengkap">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-5">
                      <label for="exampleInputJk">Jenis Kelamin</label>
                      <select name="jenis_kelamin" class="form-control" required>
                          <option value="1">Laki-laki</option>
                          <option value="2">Perempuan</option>
                      </select>
                    </div>
                    <div class="col-3">
                      <label for="exampleInputUsia">Usia</label>
                      <input type="number" name="usia" class="form-control" value="{{old('usia')}}" placeholder="Usia">
                    </div>
                    <div class="col-4">
                      <label for="exampleInputNoHP">No HP</label>
                      <input type="number" name="nohp" class="form-control" value="{{old('nohp')}}" placeholder="No HP">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputAlamat">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="5" class="form-control" placeholder="Alamat">{{old('alamat')}}</textarea>
                  </div>
                  <div class="row">
                    <div class="col-4">
                      <label for="exampleInputIzin">Izin Orang Tua</label>
                      <select name="izin_ortu" class="form-control" required>
                          <option value="1">Ya</option>
                          <option value="2">Tidak</option>
                      </select>
                    </div>
                    <div class="col-4">
                      <label for="exampleInputOffline">Bersedia Offline</label>
                      <select name="bersedia_offline" class="form-control" required>
                          <option value="1">Ya</option>
                          <option value="2">Tidak</option>
                      </select>
                    </div>
                    <div class="col-4">
                      <label for="exampleInputNoHP">No HP OrangTua</label>
                      <input type="number" name="nohp_ortu" class="form-control" value="{{old('nohp_ortu')}}" placeholder="No HP Orang Tua">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Foto</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" accept=".jpg,.jpeg,.png,.JPG,.JPEG,.PNG" class="custom-file-input" id="foto" name="foto" onchange="previewFile(this)">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Winrate</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" accept=".jpg,.jpeg,.png,.JPG,.JPEG,.PNG" class="custom-file-input" id="winrate" name="winrate" onchange="previewFile(this)">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ url('dataplayer')}}" class="btn btn-secondary">Cancel</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
    </div>
</div>
@endsection
@push('js')
    <!-- Bootstrap 4 -->
    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- bs-custom-file-input -->
    <script src="{{ asset('backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('backend/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('backend/dist/js/demo.js')}}"></script>
    <!-- Page specific script -->
    <script>
    $(function () {
      bsCustomFileInput.init();
    });
</script>
<script>
  function previewFile(input) {
    var File = $("input[type=file]").get(0).files[0];
      if (file) {
        var reader = new FileReader();
        reader.onload = function(){
          $('#previewImg').attr("src", reader.result);
        }
        reader.readAsDataURL(File);
      }
  } 
</script>
@endpush