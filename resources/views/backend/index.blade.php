@extends('backend.layouts.default')

@section('head')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="{{asset('assets/backend/images/favicon_1.ico')}}">
<title>Admin dash</title>
@endsection

@section('content')

@section('title_content')
<h4 class="page-title">Tableau de bord</h4>
<p class="text-muted page-title-alt">
</p>
@endsection

<div class="row">
    <div class="col-md-6 col-lg-3">
        <div class="widget-bg-color-icon card-box">
            <div class="bg-icon bg-icon-info pull-left">
                <i class="glyphicon glyphicon-user text-info"></i>
            </div>
            <div class="text-right">
                <h3 class="text-dark"><b class="counter">{{$users}}</b></h3>
                <p class="text-muted">Utilisateurs</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="widget-bg-color-icon card-box">
            <div class="bg-icon bg-icon-custom pull-left">
                <i class="icon-people text-custom"></i>
            </div>
            <div class="text-right">
                <h3 class="text-dark"><b class="counter">{{$responsables}}</b></h3>
                <p class="text-muted">Responsable</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="widget-bg-color-icon card-box">
            <div class="bg-icon bg-icon-info pull-left">
                <i class="md-place text-info"></i>
            </div>
            <div class="text-right">
                <h3 class="text-dark"><b class="counter">{{$structures}}</b></h3>
                <p class="text-muted">Structures</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="widget-bg-color-icon card-box">
            <div class="bg-icon bg-icon-custom pull-left">
                <i class="icon-directions text-custom"></i>
            </div>
            <div class="text-right">
                <h3 class="text-dark"><b class="counter">{{$demandes}}</b></h3>
                <p class="text-muted">Demandes</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

@stop

@section('js')


@endsection