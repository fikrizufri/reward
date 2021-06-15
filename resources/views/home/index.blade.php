@extends('template.app')

@section('content')
<section class="content">
  <div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <p>Jumlah Rapat</p>
            <h3>{{$rapat}}</h3>

          </div>
          <div class="icon">
            <i class="fa fa-microphone"></i>
          </div>
          <a href="{{route('rapat.index')}}" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <p>Angota DPRD</p>
            <h3>{{$anggota}}</h3>

          </div>
          <div class="icon">
            <i class="fa fa-user-circle"></i>
          </div>
          <a href=" {{route('anggota.index')}}" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <p>Sekretariat DPRD</p>
            <h3>{{$pegawai}}</h3>

          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
          <a href="{{route('pegawai.index')}}" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <p>Jenis Rapat</p>
            <h3>{{$jenisRapat}}</h3>

          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="{{route('jenis-rapat.index')}}" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <div class="row">
      <div class="col-lg-12 col-12 text-center mt-4">
        <img src="{{'template/dist/img/logo.png'}}" width="30%">
      </div>
      <div class="col-lg-12 col-12 text-center">
        <h2 class="text-center"> <b>E-Risalah <br> DPRD Kota Samarinda </b></h2>
      </div> 

    </div>
    <!-- /.row -->


    <!-- /.row -->
  </div>
  <!--/. container-fluid -->
</section>

@stop

@push('chart')
@endpush
@push('style')
<style>
  @media (max-width: 500px) {
    #perda {
      height: 52px;
    }
  }

  .modal {
    text-align: center;
  }

  @media screen and (min-width: 768px) {
    .modal:before {
      display: inline-block;
      vertical-align: middle;
      content: " ";
      position: absolute;
      height: 100%;

    }
  }

  .modal-dialog {
    display: inline-block;
    text-align: left;
    vertical-align: middle;
    top: 50%;
  }
</style>
@endpush
@push('script')
<script>
  $(function() {


  });
</script>
<!-- <script src="{{asset('template/plugins/chart.js/Chart.min.js')}}"></script> -->

@endpush