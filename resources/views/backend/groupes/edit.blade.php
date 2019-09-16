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
      <h4 class="header-title m-t-0 m-b-30">Modifier un groupe (Halde-Terril) </h4>
      <div class="row">
        <div class="col-lg-7 col-lg-offset-2">

          <!-- Start add form -->
          <form action="{{route('groupes.update',$groupe)}}" method="post" data-parsley-validate novalidate>
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('nom_publication') ? ' has-error' : '' }}">
              <label for="nom">Nom groupe</label>
              <input type="text" name="nom_publication" class="form-control" id="nom"
                value="{{ old('nom_publication',$groupe->nom_publication) }}">

              @if ($errors->has('nom_publication'))
              <span class="help-block">
                <strong>{{ $errors->first('nom_publication') }}</strong>
              </span>
              @endif
            </div>

            <div class="form-group{{ $errors->has('date_publication') ? ' has-error' : '' }}">
              <label for="nom">Date publication</label>
              <div class='input-group date'>
                <input type="date" id="date_publication" name="date_publication" class="form-control"
                  id="date_publication" value="{{ old('date_publication',$groupe->date_publication) }}">
                </span </div> @if ($errors->has('date_publication'))
                <span class="help-block">
                  <strong>{{ $errors->first('date_publication') }}</strong>
                </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('date_fin_publication') ? ' has-error' : '' }}">
                <label for="date_fin_publication">Date fin publication</label>
                <div class='input-group date'>
                  <input type="date" id="date_fin_publication"
                    name="date_fin_publication" class="form-control" id="date_fin_publication"
                    value="{{ old('date_fin_publication',$groupe->date_fin_publication) }}">
                  </span </div> @if ($errors->has('date_fin_publication'))
                  <span class="help-block">
                    <strong>{{ $errors->first('date_fin_publication') }}</strong>
                  </span>
                  @endif
                </div>
                <br><br>

                <div class="form-group{{ $errors->has('disponible') ? ' has-error' : '' }}">
                  <label for="disponible">Publier ?</label>
                  <label for="disponible">Oui</label>
                  <input type="radio" name="disponible" @if ($groupe->disponible==1) checked @endif
                  class="" id="disponible"
                  value="1">
                  <label for="disponible">Non</label>
                  <input type="radio" name="disponible" @if ($groupe->disponible==0) checked @endif
                  class="" id="disponible"
                  value="0">

                  @if ($errors->has('disponible'))
                  <span class="help-block">
                    <strong>{{ $errors->first('disponible') }}</strong>
                  </span>
                  @endif
                </div>

                <div class="form-group text-right m-b-0">
                  <button class="btn btn-primary waves-effect waves-light" type="submit">
                    Enregister
                  </button>
                  <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
                    Effacer
                  </button>
                </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection

@section('js')


@endsection