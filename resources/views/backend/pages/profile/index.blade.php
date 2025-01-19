\@extends('backend.layouts-new.app')

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
            <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title text-center">Tambah / Edit Profile</h4>
                            <hr>
                            <div class="row mb-2">
                                <div class="col-lg-12">
                                    <div class="form-group col-md-12">
                                        <label class="mt-2">Image</label>
                                        <input type="file" name="background_image" class="form-control dropify"
                                            accept="image/*" data-height="200"
                                            data-default-file="{{ isset($profile->background_image) ? asset('assets/img/profile/' . $profile->background_image) : '' }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-4">
                                <label>Tentang Kami</label>
                                <textarea name="tentang_kami" class="summernote">{{ $profile->tentang_kami ?? '' }}</textarea>
                            </div>
                            <input type="hidden" name="visi" value="{{ $profile->visi ?? '' }}">
                            <input type="hidden" name="misi" value="{{ $profile->misi ?? '' }}">

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
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

   
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
