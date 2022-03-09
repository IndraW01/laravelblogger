{{-- @if ($errors->any())
    @dd($errors)
@endif --}}
@extends('Dashboard.Layout.main')

@section('title', 'Dashboard | MyPost')

@section('content')
<div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        @if (session()->has('failed'))
            <div class="alert alert-danger col-md-6" role="alert">
                {{ session()->get('failed') }}
            </div>
        @endif
        <!-- general form elements -->
        <div class="card card-primary col-md-6">
          <div class="card-header">
            <h3 class="card-title">Tambah Category</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
            <form action="{{ route('dashboard.category.store') }}" method="POST">
                @csrf
                <input type="hidden" name="jumlah" value="{{ $jumlah }}">
                <div class="card-body">
                    <label for="title">Title Category</label>
                    @for ($i = 1; $i <= $jumlah; $i++ )
                        <div class="form-group">
                            <input type="text" class='form-control {{ session('failed') ? 'is-invalid' : '' }}' name="title-{{ $i }}">
                        </div>
                    @endfor
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

