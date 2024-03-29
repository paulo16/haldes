@extends('backend.layouts.default')

@section('head')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('assets/backend/images/favicon_1.ico')}}">
    <title>Admin dash</title>
    <link href="{{asset('assets/backend/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/backend/plugins/datatables/buttons.bootstrap.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/backend/plugins/datatables/responsive.bootstrap.min.css')}}" rel="stylesheet"
          type="text/css"/>
@endsection

@section('content')

@section('title_content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="header-title m-t-0 m-b-30">Modifier Utilisateur</h4>
                <div class="row">
                    <div class="col-lg-7 col-lg-offset-2">

                        <!-- Start add form -->
                        <form action="{{route('users.update',$user)}}" method="post" data-parsley-validate novalidate>
                          {{ csrf_field() }}
                          {{ method_field('PATCH') }}

                          <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
                            <label for="nom">Nom*</label>
                            <input type="text" name="nom" parsley-trigger="change" required placeholder="Entrer le nom" class="form-control" id="nom" value="{{ old('nom',$user->name) }}">

                            @if ($errors->has('nom'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nom') }}</strong>
                                </span>
                            @endif
                          </div>

                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Mot de passe *</label>
                            <input type="password" name="password" parsley-trigger="change" required placeholder="Entrer le mot de passe" class="form-control" id="password" 
                            value="{{ old('password') }}">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                          </div>

                          <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password_confirmation">Mot de passe *</label>
                            <input type="password" name="password_confirmation" parsley-trigger="change" required placeholder="Entrer le mot de passe" class="form-control" id="password_confirmation" value="{{ old('password_confirmation') }}">

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                          </div>

                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">Adresse Email*</label>
                            <input type="email" name="email" parsley-trigger="change" required placeholder="Entrer l'adresse email" class="form-control" id="email" value="{{ old('email',$user->email) }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                          </div>

                            <div class="row">
                              <div class="form-group col-lg-3">
                               <label for="role">Rôle*</label>
                               <select class="form-control" name="role" id="role">
                                   @foreach ($roles as $r)
                                     <option value="{{$r['id']}}" {{(in_array($r['id'],isset($user->roles) ?$user->roles->pluck('id')->toArray():[]))?'selected="selected"':''}}>
                                          {{$r['name']}}
                                      </option>
                                   @endforeach
                               </select>
                               </div>
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
                        <!-- End add form-->
                    </div>
                </div>

            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection