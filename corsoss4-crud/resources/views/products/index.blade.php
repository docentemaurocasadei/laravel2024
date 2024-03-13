@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="mycolor bianco">Laravel Crud con Datatables</h1>
    <a href="{{route('products.create')}}" class="btn btn-primary btn-sm">Nuovo Record</a>
    <table class="table table-bordered data-table" id="sstable">
        <thead>
            <tr>
                <th>N.</th>
                <th>Name</th>
                <th>Codice</th>
                <th>Azione</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

@endsection
@push('after_scripts')
<script type="module">
    $(function () {
      
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('products.index') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'name', name: 'name'},
              {data: 'sku', name: 'sku'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ],
          "order": [[0, 'desc']],
      });
      
    });

  </script>
@endpush