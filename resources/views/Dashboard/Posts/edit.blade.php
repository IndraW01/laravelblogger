{{-- @dd($errors->all()) --}}
@extends('Dashboard.Layout.main')

@section('title', 'Dashboard | MyPost')

@push('custom-css')
<link rel="stylesheet" href="{{ asset('asset/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('asset/plugins/summernote/summernote-bs4.min.css') }}">
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Post</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ route('dashboard.post.update', ['post' => $post->slug]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control {{ session('title') ? 'is-invalid' : '' }} @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title', $post->title) }}">
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                @if (session('title'))
                <div class="invalid-feedback">
                    {{ session('title') }}
                </div>
                @endif
              </div>
              <div class="form-group">
                <label>Category</label>
                <select class="select2 select2" name="category[]" multiple="multiple" data-placeholder="Select Category" style="width: 100%;">
                    @foreach ($categories as $category)
                        @if (in_array($category->id, old('category', $post->categories->pluck('id')->all()) ?? []))
                        <option value="{{ $category->id }}" selected>{{ $category->title_category }}</option>
                        @else
                        <option value="{{ $category->id }}">{{ $category->title_category }}</option>
                        @endif
                    @endforeach
                </select>
                @error('category')
                    <p class=" text-danger"><small>{{ $message }}</small></p>
                @enderror
              </div>
              <div class="form-group">
                <label for="gambar">Gambar</label>
                <img src="{{ asset('images/' . $post->gambar) }}" alt="" width="200" height="200" class=" d-block img-thumbnail mb-3">
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input @error('gambar') is-invalid @enderror" name="gambar" id="gambar">
                    <label class="custom-file-label" for="gambar">Choose file</label>
                  </div>
                </div>
                @error('gambar')
                    <p class=" text-danger"><small>{{ $message }}</small></p>
                @enderror
              </div>
              <div class="form-group">
                    <label for="summernote">Body</label>
                    <textarea id="summernote" class="form-control" name="body">{{ old('body', $post->body) }}</textarea>
                    @error('body')
                    <p class="text-danger"><small>{{ $message }}</small></p>
                    @enderror
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.card -->

      </div>
      <!--/.col (left) -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
@endsection

@push('custom-js')
<!-- Select2 -->
<script src="{{ asset('asset/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('asset/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('asset/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- Page specific script -->
<script>
    $(function () {
      bsCustomFileInput.init();
    });

    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
@endpush
