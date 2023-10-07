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

{{--<div class="card-body p-0">--}}
{{--    <div class="table-responsive">--}}
{{--        <table class="table" id="jobs-table">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>Title</th>--}}
{{--                <th>Start Date</th>--}}
{{--                <th>End Date</th>--}}
{{--                <th>Active</th>--}}
{{--                <th colspan="3">Action</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach($jobs as $job)--}}
{{--                <tr>--}}
{{--                    <td>{{ $job->title }}</td>--}}
{{--                    <td>{{ $job->start_date }}</td>--}}
{{--                    <td>{{ $job->end_date }}</td>--}}
{{--                    <td>{{ $job->active == 1 ? 'active':'inactive' }}</td>--}}
{{--                    <td  style="width: 120px">--}}
{{--                        {!! Form::open(['route' => ['jobs.destroy', $job->id], 'method' => 'delete']) !!}--}}
{{--                        <div class='btn-group'>--}}
{{--                            <a href="{{ route('jobs.show', [$job->id]) }}"--}}
{{--                               class='btn btn-default btn-xs'>--}}
{{--                                <i class="far fa-eye"></i>--}}
{{--                            </a>--}}
{{--                            <a href="{{ route('jobs.edit', [$job->id]) }}"--}}
{{--                               class='btn btn-default btn-xs'>--}}
{{--                                <i class="far fa-edit"></i>--}}
{{--                            </a>--}}
{{--                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
{{--                        </div>--}}
{{--                        {!! Form::close() !!}--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}

{{--    <div class="card-footer clearfix">--}}
{{--        <div class="float-right">--}}
{{--            @include('adminlte-templates::common.paginate', ['records' => $jobs])--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
