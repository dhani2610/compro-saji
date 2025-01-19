@extends('backend.layouts-new.app')

@section('content')
    <style>
        .form-check-label {
            text-transform: capitalize;
        }

        .select2 {
            width: 100% !important;
        }

        label {
            float: left;
            color: black;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 10px;
        }
    </style>

    <div class="main-content-inner">
        <div class="row">
            <form action="{{ route('our-services.update', $our_services->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title text-center">Edit</h4>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group col-md-12">
                                        <label class="mt-2" for="jenis">judul</label>
                                        <input type="text" class="form-control" id="judul"
                                            value="{{ $our_services->judul }}" name="judul" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="mt-2" for="jenis">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10">{{ $our_services->deskripsi }} </textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group col-md-12">
                                        <label class="mt-2" for="merek">Gambar</label>
                                        <input type="file" name="gambar" class="form-control dropify" accept="image/*"
                                            data-height="200" data-default-file="{{ asset('assets/img/our-services/' . $our_services->gambar) }}"  />
                                    </div>
                                </div>

                            </div>

                            <button class="btn btn-primary mt-4" style="float: right" type="submit">Simpan Data</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">

    <script>
        // Initialize Dropify
        $('.dropify').dropify();
    </script>
@endsection
