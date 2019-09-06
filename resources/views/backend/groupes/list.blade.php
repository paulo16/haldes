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
            <h4 class="header-title m-t-0 m-b-30">Liste des groupes Haldes/Terrils </h4>

            <table id="groupe-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th>{{ Lang::get('contenu.groupe.nom')}}</th>
                        <th>{{ Lang::get('contenu.groupe.date_publication')}}</th>
                        <th>{{ Lang::get('contenu.groupe.date_fin_publication')}}</th>
                        <th>{{ Lang::get('contenu.groupe.action')}}</th>
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
<script src="{{asset('assets/backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables/responsive.bootstrap.min.js')}}"></script>
<script>
    $(document).ready(function () {
            var table = $('#groupe-table')
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
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('groupes.data') !!}',
                    data: {_token: '{{ csrf_token() }}'},
                    dom: 'Bfrtip',
                    buttons: ['csv', 'excel', 'pdf'],
                    columns: [
                        {data: 'nom_publication', name: 'nom_publication'},
                        {data: 'date_publication', name: 'date_publication'},
                        {data: 'date_fin_publication', name: 'date_fin_publication'},
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
                var url = '{{ route("groupes.delete", ":id") }}';
                url = url.replace(':id', id);

                swal(swal_ot, function () {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {_token: '{{ csrf_token() }}'},
                    }).done(function (result) {
                        //var rep= JSON.stringify(reponse);
                        //console.log(result);
                        if (result.reponse == "impossible") {
                            swal("{{Lang::get('contenu.groupe.impossible')}}", "{{Lang::get('contenu.groupe.sub_impossible')}}", "warning");

                        } else {
                            swal("{{Lang::get('contenu.admin.supprime')}}", "{{Lang::get('contenu.admin.sub_sup')}}", "success");

                        }
                        table.ajax.reload(null, false);
                        

                    }).error(function () {
                        swal("{{Lang::get('contenu.admin.oops')}}", "{{Lang::get('contenu.admin.problem_server')}}", "error");
                    });
                });
            });


         //////////////////// Publier ///////////////////////////////////

            $(document).on('click', '.publier', function () {
                var id = $(this).data('id');
                var swal_ot = {
                    title: "{{Lang::get('contenu.groupe.sure')}}",
                    text: "{{Lang::get('contenu.groupe.subtext_sure')}}",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "{{Lang::get('contenu.groupe.confirm_btn')}}",
                    cancelButtonText: "{{Lang::get('contenu.groupe.cancel_btn')}}",
                    closeOnConfirm: false
                };
                var url = '{{ route("groupes.publier", ":id") }}';
                url = url.replace(':id', id);

                swal(swal_ot, function () {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {_token: '{{ csrf_token() }}'},
                    }).done(function (result) {

                        console.log(result);
                        if (result.reponse == "impossible") {

                            swal("{{Lang::get('contenu.groupe.impossible_pub')}}", "{{Lang::get('contenu.groupe.sub_impossible_pub')}}", "warning");

                        } else {
                            swal("{{Lang::get('contenu.groupe.publier')}}", "{{Lang::get('contenu.groupe.sub_publier')}}", "success");

                        }
                        table.ajax.reload(null, false);
                        

                    }).error(function () {
                        swal("{{Lang::get('contenu.admin.oops')}}", "{{Lang::get('contenu.admin.problem_server')}}", "error");
                    });
                });
            });

        });
</script>



@endsection