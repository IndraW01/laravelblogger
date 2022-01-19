@extends('Dashboard.Layout.main')

@section('title', 'Dashboard | MyPost')

@push('custom-css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('asset/plugins/toastr/toastr.min.css') }}">
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header position-relative py-3">
            <h3 class="card-title">Categories</h3>
            <a href="{{ route('dashboard.post.create') }}" class="btn btn-primary position-absolute" style="right: 20px; top: 8px;"><i class="fas fa-fw fa-plus"></i> Tambah</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Title</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
              @foreach ($categories as $key => $category)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->title_category }}</td>
                <td>
                    <a href="{{ route('dashboard.category.show', ['category' => $category->slug_category]) }}" class="btn btn-success mb-1"><i class="far fa-fw fa-eye"></i></a>
                    <a href="{{ route('dashboard.category.edit', ['category' => $category->slug_category]) }}" class="btn btn-warning mb-1"><i class="fas fa-fw fa-pen"></i></a>
                    <form action="{{ route('dashboard.category.destroy', ['category' => $category->slug_category]) }}" method="POST" class=" d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah yakin menghapus Post ?')"><i class="fas fa-fw fa-trash"></i></button>
                    </form>
                </td>
              </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
@endsection

@push('custom-js')
<!-- DataTables  & Plugins -->
<script src="{{ asset('asset/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('asset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('asset/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('asset/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('asset/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('asset/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('asset/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('asset/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('asset/plugins/toastr/toastr.min.js') }}"></script>

<!-- Page specific script -->
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });

    @if (session('success'))
        toastr.success("{{ session('success') }}")
    @endif
    @if (session()->has('failed'))
        toastr.error("{{ session()->get('failed') }}")
    @endif
</script>

@endpush
