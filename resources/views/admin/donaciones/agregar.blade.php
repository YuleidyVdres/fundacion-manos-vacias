@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/tipo-cancer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/form-style.css') }}" rel="stylesheet">
@endsection

@section('content')
    @include('admin.common.navbar')
    <section class="row">
        <div class="col-xs-12 col-sm-12" id="title">
            <h2 id="title-pag">Agregar Donación</h2>
        </div>
    </section>
    <section class="row">
        <div class="col-xs-12 col-sm-12">
            <form method="POST" action="" class="form-width">
                <div class="form-group">
                    <div class="input-group input-group-md">
                        <span class="input-group-addon border-inp bck-icon" id="inputNombre">
                            <i class="fa fa-asterisk" aria-hidden="true"></i>
                        </span>
                        <input type="text" id="donacion" name="donacion" class="form-control border-inp" placeholder="Nombre de donación" aria-describedby="inputNombre" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-md">
                        <span class="input-group-addon border-inp bck-icon" id="tipoDonacion">
                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i> 
                        </span>
                        <select name="tipo-donacion" id="tipo-donacion" class="form-control border-inp" required>
                            <option value="medicamento">Medicamento</option>
                            <option value="insumo">Insumo</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default btn-lg btn-submit">Guardar</button>
                </div>
            </form>
        </div>
    </section>
@endsection