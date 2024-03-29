@extends('backend.layouts.default')

@section('head')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="{{asset('assets/backend/images/favicon_1.ico')}}">
<title>Admin dash</title>
<link href="{{asset('assets/backend/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet"
    type="text/css" />
<link href="{{asset('assets/backend/plugins/datatables/buttons.bootstrap.min.css')}}" rel="stylesheet"
    type="text/css" />
<link href="{{asset('assets/backend/plugins/datatables/responsive.bootstrap.min.css')}}" rel="stylesheet"
    type="text/css" />
@endsection

@section('content')

@section('title_content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="header-title m-t-0 m-b-30">Liste des Haldes/Terrils </h4>
            <div class="row">
                <div class="col-sm-6">
                    <div class="m-b-30">
                        <a id="add-substance" role="button" href="{{route('haldes.create')}}"
                            class="btn btn-primary waves-effect waves-light">
                            AJOUTER UN TERRIL <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>

            <table id="haldes-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th>
                            {{ Lang::get('contenu.demande.nom_halde')}}
                        </th>
                        <th>
                            {{ Lang::get('contenu.demande.coordonnees')}}
                        </th>
                        <th>
                            {{ Lang::get('contenu.demande.carte')}}
                        </th>
                        <th>
                            {{ Lang::get('contenu.demande.nom_region')}}
                        </th>
                        <th>
                            {{ Lang::get('contenu.demande.nom_province')}}
                        </th>

                        <th>
                            {{ Lang::get('contenu.demande.qte_dechets')}}
                        </th>
                        <th>
                            {{ Lang::get('contenu.demande.substances')}}
                        </th>
                        <th>
                            {{ Lang::get('contenu.demande.reserver')}}
                        </th>
                        <th>
                            {{ Lang::get('contenu.demande.publication')}}
                        </th>
                        <th>
                            {{ Lang::get('contenu.demande.info_complementaires')}}
                        </th>
                        <th>
                            {{ Lang::get('contenu.page_view_halde.annuler')}}
                        </th>

                        <th>
                            {{ Lang::get('contenu.demande.action')}}
                        </th>

                    </tr>
                </thead>
            </table>

        </div>
    </div><!-- end col -->
</div>
<!-- end row -->
<!-- MODAL-->
@endsection

@stop

@section('js')
<!-- Datatables-->
<script src="{{ asset('assets/backend/plugins/datatables/jquery.dataTables.min.js') }}">
</script>
<script src="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap.js') }}">
</script>
<script src="{{ asset('assets/backend/plugins/datatables/dataTables.buttons.min.js') }}">
</script>
<script src="{{ asset('assets/backend/plugins/datatables/buttons.bootstrap.min.js') }}">
</script>
<script src="{{ asset('assets/backend/plugins/datatables/pdfmake.min.js') }}">
</script>
<script src="{{ asset('assets/backend/plugins/datatables/vfs_fonts.js') }}">
</script>
<script src="{{ asset('assets/backend/plugins/datatables/dataTables.responsive.min.js') }}">
</script>
<script src="{{ asset('assets/backend/plugins/datatables/buttons.html5.min.js') }}">
</script>
<script src="{{ asset('assets/backend/plugins/datatables/dataTables.colVis.js') }}">
</script>
<script src="{{ asset('assets/backend/plugins/datatables/buttons.print.min.js') }}">
</script>
<script src="{{ asset('assets/backend/plugins/datatables/responsive.bootstrap.min.js') }}">
</script>
<script>
    $(document).ready(function () {
            var table = $('#haldes-table')
                .DataTable({
                    "oLanguage": {
                        "sProcessing": "{{ Lang::get('datatable.sProcessing') }}",
                        "sSearch": "{{ Lang::get('datatable.sSearch') }}",
                        "sLengthMenu": "{{ Lang::get('datatable.sLengthMenu') }}",
                        "sInfo": "{{ Lang::get('datatable.sInfo') }}",
                        "sInfoEmpty": "{{ Lang::get('datatable.sInfoEmpty') }}",
                        "sInfoFiltered": "{{ Lang::get('datatable.sInfoFiltered') }}",
                        "sInfoPostFix": "{{ Lang::get('datatable.sInfoPostFix') }}",
                        "sLoadingRecords": "{{ Lang::get('datatable.sLoadingRecords') }}",
                        "sZeroRecords": "{{ Lang::get('datatable.sZeroRecords') }}",
                        "sEmptyTable": "{{ Lang::get('datatable.sEmptyTable') }}",
                        "oPaginate": {
                            "sFirst": "{{ Lang::get('datatable.sFirst') }}",
                            "sPrevious": "{{ Lang::get('datatable.sPrevious') }}",
                            "sNext": "{{ Lang::get('datatable.sNext') }}",
                            "sLast": "{{ Lang::get('datatable.sLast') }}"
                        },
                        "oAria": {
                            "sSortAscending": "{{ Lang::get('datatable.sSortAscending') }}",
                            "sSortDescending": "{{ Lang::get('datatable.sSortDescending') }}"
                        }
                    },
                    order: [[ 0, "desc" ]],
                    pageLength: 6,
                    lengthMenu: [
                    [6, 30, 50, 1000],
                    [6, 30, 50, "1000"]
                    ],
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('haldes.data') !!}',
                    data: {_token: '{{ csrf_token() }}'},
                    dom: "<'row'<'col-sm-3'l><'col-sm-4'B><'col-sm-5'f>>" +
                         "<'row'<'col-sm-12'tr>>" +
                         "<'row'<'col-sm-12'ip>>",
                    buttons: [
                        {
                            extend: "pdfHtml5",
                            title: "Plateforme Haldes-Terrils",
                            exportOptions: {
                                columns: [0,1,2,3,4,5,6,7,8,9,10]
                            }
                        },
                        {
                            extend: "csvHtml5",
                            title: "Plateforme Haldes-Terrils",
                            exportOptions: {
                                columns: [0,1,2,3,4,5,6,7,8,9,10]
                            }
                        },
                        {
                            extend: "print",
                            title: "Plateforme Haldes-Terrils",
                            text: "imprimer",
                            exportOptions: {
                                columns: [0,1,2,3,4,5,6,7,8,9,10]
                            }
                        },
                ],
                columns: [
                    {data: 'nom_halde', name: 'haldes.nom'},
                    {data: 'coordonnees', name: 'coordonnees'},
                    {data: 'carte', name: 'carte'},
                    {data: 'nom_region', name: 'nom_region'},
                    {data: 'province_noms', name: 'province_noms'},
                    {data: 'qte_dechets', name: 'qte_dechets'},
                    {data: 'substance_noms', name: 'substance_noms'},
                    {data: 'reserver', name: 'reserver'},
                    {data: 'date_publication', name: 'date_publication'},
                    {data: 'info_complementaires', name: 'info_complementaires'},
                    {data: 'annuler', name: 'annuler'},
                    {data: 'action', name: 'action'}
                ],

                });

            //////////////////// Delete User ///////////////////////////////////

            $(document).on('click', '.delete', function () {
                var id = $(this).data('id');
                var swal_ot = {
                    title: "{{Lang::get('contenu.admin.sure')}}",
                    text: "{{Lang::get('contenu.admin.subtext_sure')}}",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "{{Lang::get('contenu.admin.confirm_btn')}}",
                    cancelButtonText: "{{Lang::get('contenu.admin.cancel_btn')}}",
                    closeOnConfirm: false
                };
                var url = '{{ route("haldes.delete", ":id") }}';
                url = url.replace(':id', id);

                swal(swal_ot, function () {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {_token: '{{ csrf_token() }}'},
                    }).done(function () {
                        swal("{{Lang::get('contenu.admin.supprime')}}", "{{Lang::get('contenu.admin.sub_sup')}}", "success");
                        table.ajax.reload(null, false);
                        ;

                    }).error(function () {
                        swal("{{Lang::get('contenu.admin.oops')}}", "{{Lang::get('contenu.admin.problem_server')}}", "error");
                    });
                });
            });

        });
</script>



@endsection