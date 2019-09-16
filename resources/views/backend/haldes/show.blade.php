@extends('backend.layouts.default')

@section('head')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="{{asset('assets/backend/images/favicon_1.ico')}}">
<title>Admin|Historique</title>
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
            <h4 class="header-title m-t-0 m-b-30">Historique halde</h4>
            <form>
                <input type="hidden" name="id_demande" id="id_demande" value="{{$halde->id}}">
            </form>
            <div class="row">
                <div class="col-sm-12">
                    <table>
                        <tr>
                            <td>nom: </td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                            <td> {{$halde->nom}}</td>
                        </tr>
                        <tr>
                            <td>lieu: </td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                            <td> {{$halde->x_y}}</td>
                        </tr>
                        <tr>
                            <td>carte: </td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                            <td> {{$halde->carte}}</td>
                        </tr>
                        <tr>
                            <td>province: </td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                            <td> {{$halde->province_noms}}<br><br></td>
                        </tr>
                        <tr>
                            <td>informations: </td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                            <td> {{$halde->info_complementaires}}</td>
                        </tr>
                        <tr>
                                <td><br><br><br><br></td>
                                <td><br><br><br><br></td>
                            </tr>
                    </table>
                </div>
            </div>

            <table id="haldes-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th>
                            {{ Lang::get('contenu.page_view_halde.nom_halde')}}
                        </th>
                        <th>
                            {{ Lang::get('contenu.page_view_halde.coordonnees')}}
                        </th>
                        <th>
                            {{ Lang::get('contenu.page_view_halde.personne')}}
                        </th>
                        <th>
                            {{ Lang::get('contenu.page_view_halde.reserver')}}
                        </th>
                        <th>
                            {{ Lang::get('contenu.page_view_halde.annuler')}}
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

            var id_demande = $('#id_demande').val();
            console.log(id_demande);
            var url = '{{ route("haldes.datahistorique", ":id") }}';
                url = url.replace(':id', id_demande);

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
                    ajax: url,
                    data: {_token: '{{ csrf_token() }}'},
                    dom: "<'row'<'col-sm-3'l><'col-sm-4'B><'col-sm-5'f>>" +
                         "<'row'<'col-sm-12'tr>>" +
                         "<'row'<'col-sm-12'ip>>",
                    buttons: [
                        {
                            extend: "pdfHtml5",
                            title: "Plateforme Haldes-Terrils",
                            exportOptions: {
                                columns: [0,1,2,3,4]
                            }
                        },
                        {
                            extend: "csvHtml5",
                            title: "Plateforme Haldes-Terrils",
                            exportOptions: {
                                columns: [0,1,2,3,4]
                            }
                        },
                        {
                            extend: "print",
                            title: "Plateforme Haldes-Terrils",
                            text: "imprimer",
                            exportOptions: {
                                columns: [0,1,2,3,4]
                            }
                        },
                ],
                columns: [
                    {data: 'nom_halde', name: 'haldes.nom'},
                    {data: 'coordonnees', name: 'coordonnees'},
                    {data: 'personne', name: 'personne'},
                    {data: 'reserver', name: 'reserver'},
                    {data: 'annuler', name: 'annuler'},
                ],


                });

        });
</script>



@endsection