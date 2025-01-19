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
        @include('backend.layouts.partials.messages')

        <div class="row">
            <form action="{{ route('footer.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title text-center">Tambah / Edit Footer</h4>
                            <hr>
                            <div class="form-group mt-4">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $footer->email ?? '' }}" id="">
                            </div>
                            <div class="form-group mt-4">
                                <label>No Handphone</label>
                                <input type="text" name="no_hp" class="form-control" value="{{ $footer->no_hp ?? '' }}" id="">
                            </div>
                            <div class="form-group mt-4">
                                <label>Link Embed Maps</label>
                                <input type="text" name="link_embed_maps" class="form-control" value="{{ $footer->link_embed_maps ?? '' }}" id="">
                            </div>
                            <div class="form-group mt-4">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control">{{ $footer->alamat ?? '' }}</textarea>
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
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

   
    <script>
        $('.dropify').dropify();
      

        // Inisialisasi Dropify

        // Inisialisasi Summernote
        $('.summernote').summernote({
            height: 200,
            placeholder: 'Tulis sesuatu di sini...',
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
       
    </script>
    
@endsection
