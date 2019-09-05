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
      <h4 class="header-title m-t-0 m-b-30">Ajouter des Sites (Haldes -Terrils)</h4>
      <div class="row">
        <div class="col-sm-10 col-sm-offset-2">

          <!-- Start add form -->
          <div class="container">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h1>Importer votre fichier des haldes </h1>
              </div>
              <div class="panel-body">
                <!--
                <a href="{{ url('downloadExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
                <a href="{{ url('downloadExcel/xlsx') }}"><button class="btn btn-success">Download Excel
                    xlsx</button></a>
                <a href="{{ url('downloadExcel/csv') }}"><button class="btn btn-success">Download CSV</button></a>
                -->
                <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;"
                  action="{{ route('importexcel.import') }}" class="form-horizontal" method="post"
                  enctype="multipart/form-data">
                  @csrf

                  @if ($errors->any())
                  <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                  @endif

                  @if (Session::has('success'))
                  <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <p>{{ Session::get('success') }}</p>
                  </div>
                  @endif

                  <table>
                    <tr>
                      <td><label for="nom">Date publication</label></td>
                      <td><input type="date" name="date_publication"></td>
                    </tr>
                    <tr>
                        <td><br></td>
                        <td><br></td>
                      </tr>
                    <tr>
                      <td><input type="file" name="import_file" /></td>
                      <td> <button class="btn btn-primary">Importer votre fichier haldes</button>
                      </td>
                    </tr>
                  </table>

                </form>

              </div>
            </div>
          </div>
          <!-- End add form-->
        </div>
      </div>

    </div>
  </div><!-- end col -->
</div>
<!-- end row -->
@endsection