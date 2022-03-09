@extends('Dashboard.Layout.main')

@section('title', 'Dashboard | MyPost')

@section('content')
<div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        @if ($errors->any())
            <div class="alert alert-danger col-md-6" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif
        <!-- general form elements -->
        <div class="card card-primary col-md-6">
          <div class="card-header">
            <h3 class="card-title">Edit Category</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
            <form action="{{ route('dashboard.category.update', ['category' => $category->slug_category]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <label for="title">Title Category</label>
                    <div class="form-group">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $category->title_category) }}">
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

