@extends('template.app')

@section('content')

<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$title}}</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ $action }}" method="post" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="card-body">
                        <div class="form-group">
                            <div>
                                <label for="username" class=" form-control-label">Username</label>
                            </div>
                            <div>
                                <input type="text" name="username" placeholder="Username" class="form-control  {{$errors->has('username') ? 'form-control is-invalid' : 'form-control'}}" value="{{ $user->username }}" disabled>
                            </div>
                            @if ($errors->has('username'))
                            <div class=" container-fluid alert alert-warning alert-dismissible fade show" role="alert">
                                {{ $errors->first('username')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="Name" class=" form-control-label">Name</label>
                            </div>
                            <div>
                                <input type="text" name="name" placeholder="Name User" class="form-control  {{$errors->has('name') ? 'form-control is-invalid' : 'form-control'}}" value="{{ $user->name }}" required>
                            </div>
                            @if ($errors->has('name'))
                            <div class=" container-fluid alert alert-warning alert-dismissible fade show" role="alert">
                                {{ $errors->first('name')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="email" class=" form-control-label">Email</label>
                            </div>
                            <div>
                                <input type="text" name="email" placeholder="email" class="form-control  {{$errors->has('email') ? 'form-control is-invalid' : 'form-control'}}" value="{{ $user->email }}" required>
                            </div>
                            @if ($errors->has('email'))
                            <div class=" container-fluid alert alert-warning alert-dismissible fade show" role="alert">
                                {{ $errors->first('email')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <div>
                                <label for="passwordNew" class=" form-control-label">Password Baru</label>
                            </div>
                            <div>
                                <input type="password" name="passwordNew" placeholder="password Baru" class="form-control  {{$errors->has('passwordNew') ? 'form-control is-invalid' : 'form-control'}}">
                            </div>
                            @if ($errors->has('passwordNew'))
                            <div class=" container-fluid alert alert-warning alert-dismissible fade show" role="alert">
                                {{ $errors->first('passwordNew')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="passwordConfrim" class=" form-control-label">Password Confrim</label>
                            </div>
                            <div>
                                <input type="password" name="passwordConfrim" placeholder="Password Confrim" class="form-control  {{$errors->has('passwordConfrim') ? 'form-control is-invalid' : 'form-control'}}">
                            </div>
                            @if ($errors->has('passwordConfrim'))
                            <div class=" container-fluid alert alert-warning alert-dismissible fade show" role="alert">
                                {{ $errors->first('passwordConfrim')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->

    @stop

    @push('script')
    <script>
        $(function() {
            $("#nama").keypress(function() {
                $("#nama").removeClass("is-invalid");
                $("#textNama").html("");
            });
            $("#username").keypress(function() {
                $("#username").removeClass("is-invalid");
                $("#textusername").html("");
            });

            // $("#id_rt").keypress(function(){
            //   $("#id_rt").removeClass("is-invalid");
            //   $("#textid_rt").html("");
            // });
            $('#cmbrt').select2({
                placeholder: '--- Pilih RT ---',
                width: '100%'
            });
            $('#cmbrule').select2({
                placeholder: '--- Pilih Jabatan ---',
                width: '100%'
            });
        });
    </script>
    @endpush