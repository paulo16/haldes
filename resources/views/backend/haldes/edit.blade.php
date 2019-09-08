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
      <h4 class="header-title m-t-0 m-b-30">Modifier Site (Halde-Terril) </h4>
      <div class="row">
        <div class="col-lg-7 col-lg-offset-2">

          <!-- Start add form -->
          <form action="{{route('haldes.update',$halde)}}" method="post" data-parsley-validate novalidate>
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
              <label for="nom">Nom*</label>
              <input type="text" name="nom" class="form-control" id="nom" value="{{ old('nom',$halde->nom) }}">

              @if ($errors->has('nom'))
              <span class="help-block">
                <strong>{{ $errors->first('nom') }}</strong>
              </span>
              @endif
            </div>

            <div class="form-group{{ $errors->has('coordonnees') ? ' has-error' : '' }}">
              <label for="coordonnees">Coordonnees*</label>
              <input type="text" name="coordonnees" parsley-trigger="change" required
                placeholder="Entrer le coordonnees" class="form-control" id="coordonnees"
                value="{{ old('coordonnees',$halde->coordonnees) }}">

              @if ($errors->has('coordonnees'))
              <span class="help-block">
                <strong>{{ $errors->first('coordonnees') }}</strong>
              </span>
              @endif
            </div>

            <div class="row">
              <div class="form-group{{ $errors->has('region') ? ' has-error' : '' }}">
                <label for="region">Region*</label>
                <select class="form-control" name="region" id="region">
                  @foreach ($regions as $r)
                  <option value="{{$r['id']}}" {{(old('region')==$r['id'])? 'selected':''}}>
                    {{$r['nom']}}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="row">
              <div class="form-group{{ $errors->has('province') ? ' has-error' : '' }}">
                <label for="province">Province*</label>
                <input type="text" name="province_noms" parsley-trigger="change" class="form-control" id="province_noms"
                value="{{ old('province_noms',$halde->province_noms) }}"
                {{-- <select class="form-control" name="province" id="province">
                  @foreach ($provinces as $r)
                  <option value="{{$r->id}}" {{(old('province')==$r->id)? 'selected':''}}>
                    {{$r->nom}}
                  </option>
                  @endforeach
                </select> --}}
              </div>
            </div>

            <div class="row">
              <div class="form-group{{ $errors->has('substance') ? ' has-error' : '' }}">
                <label for="substance">Substance exploitées*</label>
                <input type="text" name="substance" parsley-trigger="change" class="form-control" id="substance"
                  value="{{ old('substance',$halde->substance_noms) }}">
                {{-- <select class="form-control" name="substance" id="substance">
                  @foreach ($substances as $r)
                  <option value="{{$r['id']}}" {{(old('substance')==$r['id'])? 'selected':''}}>
                {{$r['nom']}}
                </option>
                @endforeach
                </select> --}}
              </div>
            </div>

            <div class="form-group{{ $errors->has('dechets') ? ' has-error' : '' }}">
              <label for="dechets">Quantité de dechets </label>
              <input type="text" name="dechets" parsley-trigger="change" class="form-control" id="dechets"
                value="{{ old('dechets',$halde->qte_dechets) }}">

              @if ($errors->has('dechets'))
              <span class="help-block">
                <strong>{{ $errors->first('dechets') }}</strong>
              </span>
              @endif
            </div>

            <div class="form-group{{ $errors->has('info_comp') ? ' has-error' : '' }}">
              <label for="info_comp">Informations complémentaire </label>
              <textarea type="text" name="info_comp" class="form-control" id="info_comp"
                value="{{ old('info_comp',$halde->info_complementaires) }}"></textarea>

              @if ($errors->has('info_comp'))
              <span class="help-block">
                <strong>{{ $errors->first('info_comp') }}</strong>
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