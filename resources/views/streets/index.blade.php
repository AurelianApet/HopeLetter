@extends('layouts.app')

@section('custom-styles')
    <link href="{{ asset('vendor/datatables/css/dataTables.bootstrap.css') }}" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/css/select2-bootstrap.css') }}" />
    <link href="{{ asset('css/tables.css') }}" rel="stylesheet" media="all">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">도, 시 관리</strong>
                        <div class="float-right">
                            <a href="{{ route('street.create') }}" class="btn btn-outline-primary btn-sm">
                                <i class="fa fa-plus"></i>&nbsp; 추가
                            </a>
                        </div>
                    </div>
                    <div class="card-body" style="padding: 0;">
                        <table class="table table-striped table-bordered" id="table1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>이름</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($streets as $index => $street)
                                    <tr>
                                        <td>{!! $index + 1 !!}</td>
                                        <td>{!! $street->name !!}</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{!! route('street.edit', $street->id) !!}">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>

                                                <a href="{{ route('street.confirm-delete', $street->id) }}" data-toggle="modal" data-target="#delete_confirm" class="item">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>이름</th>
                                <th></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-scripts')
    <script type="text/javascript" src="{{ asset('vendor/datatables/js/jquery.dataTables.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('vendor/datatables/js/dataTables.bootstrap.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('vendor/datatables/js/dataTables.responsive.js') }}" ></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#table1').DataTable({
                "responsive": true,
                "columns": [
                    {"width": "15%"},
                    {"width": "70%"},
                    {"width": "15%"}
                ],
                initComplete: function () {
                    this.api().columns().every(function (index) {
                        if (index == 0) return;
                        if (index == 2) return;
                        var column = this;
                        var select = $('<select><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                        column.data().unique().sort().each(function (d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>')
                        });
                    });
                }
            });

            $('select').select2({
                placeholder: " ",
                theme: "bootstrap"
            });


        });
    </script>

    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="student_delete_confirm_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
@endsection
