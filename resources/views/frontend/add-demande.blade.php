@extends('frontend.layouts.default')
@section('head')
<title>
    @lang('contenu.adddemande.titre_header')
</title>
@endsection
@section('header')
<header class="bg-grad-blue mt70">
    <div class="container">
        <div class="row mt20 mb30">
            <div class="col-md-6 text-left">
                <h3 class="color-light text-uppercase animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="100">
                     @lang('contenu.adddemande.suivi')
                    <small class="color-light alpha7">
                        @lang('contenu.adddemande.explorez')        
                    </small>
                </h3>
            </div>
            <div class="col-md-6 text-right pt35">
                <ul class="breadcrumb">
                    <li>
                        <h3 class="color-light text-uppercase animated fadeInUp visible">
                            @lang('contenu.adddemande.demande') 
                        </h3>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
@endsection
@section('content')
<div class="pt20 pb50" id="add_demandes">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <!--left col-->
                @include('frontend.layouts.sidemenu')
            </div>
            <!--/col-3-->
            <div class="col-md-9">
                <!-- content
                    ===================================== -->
                    <h3>
                        @lang('contenu.adddemande.faites_demande') 
                    </h3>
                    <form id="form-demande" name="form-demande">
                        @csrf
                        <div class="col-md-12 pt20">
                            <div class="form-group">
                                <label>
                                    @lang('contenu.adddemande.faites_demande')          
                                </label>
                                <select class="input-md input-circle form-control" id="type_demande" name="type_demande" value="{{ old('type_demande')}}">
                                    @foreach ($typedemandes as $d)
                                    <option value="{{$d['id']}}">
                                        {{$d['nom']}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12 pt40">
                            <table class="table" id="halde-table">
                                <thead>
                                    <tr>
                                        <th>
                                            {{ Lang::get('contenu.demande.nom_halde')}}
                                        </th>
                                        <th>
                                            {{ Lang::get('contenu.demande.nom_region')}}
                                        </th>
                                        <th>
                                            {{ Lang::get('contenu.demande.nom_province')}}
                                        </th>
                                        <th>
                                            {{ Lang::get('contenu.demande.coordonnees')}}
                                        </th>
                                        <th>
                                            {{ Lang::get('contenu.demande.qte_dechets')}}
                                        </th>
                                        <th>
                                            {{ Lang::get('contenu.demande.action_reserver')}}
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="col-md-12 pt10">
                            <div class="col-md-12 col-xs-12 text-center">
                                <button class="button button-lg button-circle button-info soumettre" id="soumettre">
                                        @lang('contenu.adddemande.soumettre')
                                </button>
                            </div>
                        </div>
                    <br>
                </form>
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
            var table = $('#halde-table')
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
                ajax: '{!! route('demandes.datahaldesfrontend') !!}',
                data: {_token: '{{ csrf_token() }}'},
                dom: "<'row'<'col-sm-3'l><'col-sm-4'B><'col-sm-5'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12'ip>>",
                "buttons": [
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
                {data: 'nom_halde', name: 'nom_halde'},
                {data: 'nom_region', name: 'nom_region'},
                {data: 'nom_province', name: 'nom_province'},
                {data: 'coordonnees', name: 'coordonnees'},
                {data: 'qte_dechets', name: 'qte_dechets'},
                {data: 'action', name: 'action'},
                ],
            });
        ////////// soumettre formulaire //////////
        $("#soumettre").click(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            e.preventDefault();

            var checker= $("input[name='halde']:checked").val() ;

            if(checker){
                var id = $(this).data('id');
                var swal_ot = {
                    title: "{{Lang::get('contenu.alert.sure')}}",
                    text: "{{Lang::get('contenu.alert.subtext_sure')}}",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "{{Lang::get('contenu.alert.confirm_btn')}}",
                    cancelButtonText: "{{Lang::get('contenu.alert.cancel_btn')}}",
                    closeOnConfirm: false
                };

                var swal_ot2 ={
                    text : ""
                }
                var url = '{{ route("demande.store") }}';

                var formData = {
                    typedemande: $('#type_demande').val(),
                    halde: $("input[name='halde']:checked").val(),
                };
                var    type = "POST";
                var redirection = '{{ route("demande.show",":id") }}';
                swal(swal_ot, function () {
                    $.ajax({
                        type: type,
                        url: url,
                        data: formData,
                    }).done(function (demande) {

                        urlto = redirection.replace(':id', demande.id);                   
                        location.href =urlto ;
                    }).error(function () {
                        swal("{{Lang::get('contenu.alert.oops')}}", "{{Lang::get('contenu.alert.problem_server')}}", "error");
                    });
                });

            }else{

                swal(
                    'Vous ne pouver pas éffectuer de demande, car vous n\'avez pas selectionner le site à exploiter , notez que celui si peut etre bloqué si la dernière demande est en traitement , acceptée ou rejetée, dans ce cas vous devez patientez respectivement 10 jours , 3mois ou 4 mois '
                    );
            }

        });
    });
</script>
@endsection
</div>