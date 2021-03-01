@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
        <div class="col-md-10">
            <a href="{{ route('permohonans.create') }}" class="btn btn-success mb-5">Create Permohonan</a>
            <table class="table table-striped table-bordered" id="table-permohonan">
                <thead>
                    <tr>
                        <th rowspan="2" class="align-middle">Id</th>
                        <th rowspan="2" class="align-middle">Nomor Permohonan</th>
                        <th rowspan="2" class="align-middle">Judul Permohonan</th>
                        <th rowspan="2" class="align-middle">Divisi</th>
                        <th colspan="2" class="text-center">Status Berkas</th>
                        <th rowspan="2" class="align-middle">Aksi</th>                      
                    </tr>
                    <tr>
                        <th>Berkas</th>
                        <th>Rilis</th>
                    </tr>
                    
                </thead>
            </table>
        </div>
    </div>   
</div>    
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('#table-permohonan').DataTable({
            serverSide : true,
            processing : true,
            ajax : {
                url: "{{ url('list-permohonan') }}",
                type: 'GET',
            },
            columns:[
                {data: 'id', name: 'id', className: 'text-center'},
                {data:'nomor_permohonan', name:'nomor_permohonan', className: 'text-center'},
                {data:'judul_permohonan', name:'judul_permohonan', className: 'text-center'},
                {data:'nama_divisi', searchable:false ,name:'nama_divisi', className: 'text-center'},
                {
                    data:'status_berkas', 
                    name:'status_berkas',
                    render: function(data, type, row){
                                switch(data){
                                    case "pending": return `<span class="badge badge-primary"><i class="fas fa-clock"></i></span>`
                                    case "approved": return `<span class="badge badge-success"><i class="fas fa-check"></i></span>`
                                    case "rejected": return `<span class="badge badge-danger"><i class="fas fa-cross"></i></span>`
                                }
                            },
                    orderable:false,
                    orderCellsTop: true, 
                    className:'text-center'
                },                
                {
                    data:'status_rilis', 
                    name:'status_rilis',
                    render: function(data, type, row){
                                switch(data){
                                    case "pending": return `<span class="badge badge-primary"><i class="fas fa-clock"></i></span>`
                                    case "rilis": return `<span class="badge badge-success"><i class="fas fa-check"></i></span>`
                                }
                            },
                    orderable:false,
                    orderCellsTop: true, 
                    className:'text-center'
                },                
                {data:'action', orderable:false, className:'text-center align-middle'}
            ],
            order:[[0,'asc']]
        });
    } );
    
</script>
<script>
    import Swal from 'sweetalert2';
    $.(document).on('click', '#confirmApprove', function (e) {
        e.preventDefault();
        var flash = $('#confirmApprove').data('flash');
        Swal.fire({
  title: 'Do you want to save the changes?',
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: `Save`,
  denyButtonText: `Don't save`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    Swal.fire('Saved!', '', 'success')
  } else if (result.isDenied) {
    Swal.fire('Changes are not saved', '', 'info')
  }
});
    });
</script>
@endpush