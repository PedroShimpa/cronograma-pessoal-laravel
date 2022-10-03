@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Cronograma') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    <table cclass="table table-striped table-bordered" style="width:100%" id="cronograma-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Criado em</th>
                                <th>Editado em </th>
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
            ],
            language: {
					url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json',
					buttons: {
						colvis: '{{trans("datatable.colvis")}}',
						pdf: '{{trans("datatable.pdf")}}',
						csv: '{{trans("datatable.csv")}}',
					}
				}
        });

       
    });
</script>
@endpush