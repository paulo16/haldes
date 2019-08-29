@extends('backend.layouts.default')

@section('head')
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<link href="{{asset('assets/backend/images/favicon_1.ico')}}" rel="shortcut icon">
<title>
    Admin dash
</title>
<link href="{{asset('assets/backend/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/backend/plugins/datatables/buttons.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/backend/plugins/datatables/responsive.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/backend/css/custom.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/backend/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection


@section('content')

@section('title_content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h3 class="header-title m-t-0 m-b-30">
                Profil Utilisateur
            </h3>
            <div class="clearfix">
                <p>
                    <img alt="profile-image" class="img-remake" src="{{asset('/assets/backend/images/customer.png')}}"/>
                    <strong>
                        Nom :
                    </strong>
                    <span class="m-l-15">
                        {{$user->name}}
                    </span>
                    <br/>
                    <br/>
                    <strong>
                        Email:
                    </strong>
                    <span class="m-l-15">
                        {{$user->email}}
                    </span>
                    <br/>
                    <strong>
                        Role:
                    </strong>
                    <span class="m-l-15">
                        {{$role}}
                    </span>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </p>
                <div class="clearfix">
                    <div class="text-left">
                        <a  href="{{ route('users.edit',$user->id)}}" class="btn btn-xs btn-primary">
                            <span class='glyphicon glyphicon-edit'>editer</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
        @stop

        @section('js')
        <!-- Datatables-->
        <script src="{{asset('assets/backend/plugins/datatables/jquery.dataTables.min.js')}}">
        </script>
        <script src="{{asset('assets/backend/plugins/datatables/dataTables.bootstrap.js')}}">
        </script>
        <script src="{{asset('assets/backend/plugins/datatables/dataTables.buttons.min.js')}}">
        </script>
        <script src="{{asset('assets/backend/plugins/datatables/vfs_fonts.js')}}">
        </script>
        <script src="{{asset('assets/backend/plugins/datatables/dataTables.responsive.min.js')}}">
        </script>
        <script src="{{asset('assets/backend/plugins/datatables/responsive.bootstrap.min.js')}}">
        </script>
        <script src="{{asset('assets/backend/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}">
        </script>

        @endsection
