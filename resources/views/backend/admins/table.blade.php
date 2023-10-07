@push('third_party_stylesheets')
    @include('layouts.datatables_css')
    <style>
        div.dataTables_wrapper div.dataTables_filter {
            margin-right: 1% !important;
        }
        div.dataTables_wrapper div.dataTables_info {
            padding: 0.85em;
        }
        div.dataTables_wrapper div.dataTables_paginate  {
            margin: 1% !important;
        }
        div.dt-buttons {
            position: initial;
            margin: 0.7% !important;
        }
    </style>
@endpush

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered dt-responsive']) !!}

@push('third_party_scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
@endpush