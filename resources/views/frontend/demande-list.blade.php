
@extends('frontend.layouts.default')

@section('head')
<title>Demandes | liste</title>
@endsection

@section('header')
    <header class="bg-grad-blue  mt70">
        <div class="container">
            <div class="row mt20 mb30">
                <div class="col-md-6 text-left">
                    <h3 class="color-light text-uppercase animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="100">SUIVI DES DEMANDES<small class="color-light alpha7">Explorez les onglets</small></h3>
                </div>
                <div class="col-md-6 text-right pt35">
                    <ul class="breadcrumb">
                        <li>
                            <H3 class="color-light text-uppercase animated fadeInUp visible">CREER DEMANDE</a></H3>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
<div id="demandes" class="pt20 pb50">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <!--left col-->
                @include('frontend.layouts.sidemenu')
            </div>
            <!--/col-3-->
            <div class="col-md-9">
                <!-- Blog Paging
                    ===================================== -->
                <div>
                    <a  href="{{ route('demande.create') }}" class="button button-md button-rounded button-info">Créer votre demande</a>
                    <br>
                    <hr />
                </div>
                <table id="demande-table" class="table">
                    <thead>
                        <tr>
                            <th scope="col"><h5>{{ Lang::get('contenu.demande.identifiant')}}</h5></th>

                            <th scope="col"><h5>{{ Lang::get('contenu.demande.nom_resp')}}</h5></th>
                            <th scope="col"><h5>{{ Lang::get('contenu.demande.nom_site')}}</h5></th>
                            <th scope="col"><h5>{{ Lang::get('contenu.demande.site_coord')}}</h5></th>
                            <th scope="col"><h5>{{ Lang::get('contenu.demande.site_region')}}</h5></th>
                            <th scope="col"><h5>{{ Lang::get('contenu.demande.site_province')}}</h5></th>
                            <th scope="col"><h5>{{ Lang::get('contenu.demande.date_demande')}}</h5></th>
                            <th scope="col"><h5>{{ Lang::get('contenu.demande.etat')}}</h5></th>
                        </tr>
                    </thead>
                </table>
</div>
</div>
</div>
</div>

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
                var table = $('#demande-table')
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
                    [6, 30, 50, "tous"]
                    ],
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('demandes.datademandes') !!}',
                    data: {_token: '{{ csrf_token() }}'},
                    dom: "<'row'<'col-sm-3'l><'col-sm-4'B><'col-sm-5'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12'ip>>",
                    "buttons": [
                    {
                        extend: "pdfHtml5",
                        title: "Plateforme Haldes-Terrils",
                        exportOptions: {
                            columns: [0,1,2,3,4,5]
                        }
                    },
                    {
                        extend: "csvHtml5",
                        title: "Plateforme Haldes-Terrils",
                        exportOptions: {
                            columns: [0,1,2,3,4,5]
                        }
                    },
                    {
                        extend: "print",
                        title: "Plateforme Haldes-Terrils",
                        text: "imprimer",
                        exportOptions: {
                            columns: [0,1,2,3,4,5]
                        }
                    },
                    ],
                    columns: [
                    {data: 'identifiant', name: 'identifiant'},
                    {data: 'nom_resp', name: 'nom_resp'},
                    {data: 'nom_site', name: 'nom_site'},
                    {data: 'region', name: 'region'},
                    {data: 'province', name: 'province'},
                    {data: 'coordonnees', name: 'coordonnees'},
                    {data: 'date_demande', name: 'date_demande'},
                    {data: 'etat', name: 'etat'},
                    ],
        });
        ////////// soumettre formulaire //////////
        $(".voir").click(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            e.preventDefault();

            var id = $(this).data('id');

            var    type = "GET";
            var url = '{{ route("demande.show",":id") }}';
            url = url.replace(':id', id);                   

            $.ajax({
                type: type,
                url: url,
            }).done(function (reponse) {

            }).error(function () {
                swal("{{Lang::get('contenu.alert.oops')}}", "{{Lang::get('contenu.alert.problem_server')}}", "error");
            });
        });
    });
    </script>
    @endsection
</div>