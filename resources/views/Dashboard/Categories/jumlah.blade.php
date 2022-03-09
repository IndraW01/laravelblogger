@extends('Dashboard.Layout.main')

@section('title', 'Dashboard | MyPost')

@section('content')
<div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Tambah Jumlah Category</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ route('dashboard.category.create') }}" method="GET" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label>Jumlah Data</label>
                    <select class="form-control" name="jumlah">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
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

