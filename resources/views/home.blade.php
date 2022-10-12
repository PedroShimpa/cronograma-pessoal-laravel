@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Cronograma') }}</div>

                <div class="card-body">
                  
                    <a class="btn btn-primary" href="{{ route('create.atividade')}}">Adicionar Atividade</a>

                    <table class="table mt-2 table-striped table-bordered" style="width:100%" id="cronograma-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Atividade</th>
                                <th>Dia da Semana</th>
                                <th>Hora</th>
                                <th>Criado em</th>
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
                    data: 'hora',
                    name: 'hora'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
            
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