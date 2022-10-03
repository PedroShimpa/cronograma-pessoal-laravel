@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cronograma') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    <table class="table table-bordered" id="cronograma-table" width="100">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js-scripts')
<script type="text/javascript">
    $(function() {
        $('#cronograma-table').DataTable({
            processing: true,
            serverSide: true,
            paging: true,
            orderable: true,
            searching: true,
            iDisplayLength: 10,
            retrieve: true,
            dom: 'lfBrtip<"links">',
            order: [
                [0, 'asc']
            ],
            ajax: "{{ route('get.all.cronogramas')}}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'atividade',
                    name: 'atividade'
                },
                {
                    data: 'dia_semana',
                    name: 'dia_semana'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'updated_at',
                    name: 'updated_at'
                }
            ]
        });
    });
</script>
@endpush