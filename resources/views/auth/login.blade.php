@extends('auth.contenido')

@section('login')
<div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card-group mb-0">
          <div class="card p-4">
            <form class="form-horizontal was-validated" method="POST" action="{{route('login')}}">
              {{csrf_field()}}<!--Para evitar falsificacion-->
              <div class="card-body">
                  <br>
                <h1><center>Acceder</center></h1>
                <p class="text-muted"><center>Control de acceso al sistema</center></p>
                <div class="input-group mb-3" {{$errors->has('usuario' ? 'is-invalid' : '')}}>
                  <span class="input-group-addon"><i class="icon-user"></i></span>
                  <input type="text" value="{{old('usuario')}}" name="usuario" id="usuario" class="form-control" placeholder="Usuario">
                  </br>
                  {!!$errors->first('usuario','<span class="invalid-feedback">:message</span>')!!}
                  
                </div>
                
                <div class="input-group mb-4" {{$errors->has('password' ? 'is-invalid' : '')}}>
                  <span class="input-group-addon"><i class="icon-lock"></i></span>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                  </br>
                  {!!$errors->first('password','<span class="invalid-feedback">:message</span>')!!}
                </div>
                <div class="row">
                      <div class="col-6">
                      <button type="submit" text-align="center" class="btn btn-primary px-4">Acceder</button>
                      </div>
                      <div class="col-6 text-right">
                      <button type="button" class="btn btn-link px-0">Olvidaste tu password?</button>
                      </div>
                </div>
              </div>
            </form>
          </div>
          <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
            <div class="card-body text-center">
              <div>
                  
                <h2>Sistema de Ventas Roa SeaFood</h2>
                <img  src="../img/logolog.png" alt="logo"  style="max-width:70%;width:auto;height:auto;">
                
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
