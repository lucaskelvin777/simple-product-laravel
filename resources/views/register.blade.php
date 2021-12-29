@extends('layouts/app')
@section('title', 'Cadastrar produto')
@section('importsHead')
<link rel="stylesheet" href="{{URL::asset('/assets/css/register.css')}}">
@endsection
@section('content')
@include('widgets/modal-recort')
<div class="container">
    <h1>Produtos<span class="primary">.</span> </h1>
    <div class="d-flex justify-content-center">
        <div>
            <a href="{{url('')}}" class="btn btn-secondary mb-4">
                <i class="fas fa-chevron-left"></i> Voltar</a>
            <h4 class="card-title mb-4"> Cadastrar produto</h4>
            <form method="post" id="formProduct" enctype="multipart/form-data">
                {{csrf_field()}}
                <input maxlength="255" type="hidden" id="x" name="x" /> <input maxlength="255" type="hidden" id="y" name="y" />
                <input type="hidden" id="d" name="d" />
                <input maxlength="255" type="hidden" id="w" name="w" /> <input maxlength="255" type="hidden" id="h" name="h" />
                <input maxlength="255" type="hidden" name="imgCropped" id="imgCropped" />
                <div class="row justify-content-center">
                    <figure class="img-preview-card d-flex justify-content-center">
                        <img src="{{URL::asset('/assets/img/no-image.png')}}" alt="" class="img-fluid img-preview " id="imgPreview">
                        <canvas id="canvas" height="5" width="5" class="img-fluid"></canvas>
                        <figcaption class="text-center">Pré visualização <br /> <span class="obs"></span>
                        </figcaption>
                    </figure>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="w160">
                        <label for="image" class="label-file"><i class="fas fa-camera"></i> Carregar foto</label>
                        <input type="file" class="form-input hidden-element" id="image" name="image" accept="image/png, image/jpeg, image/jpg" aria-describedby="fotoHelp">
                    </div>
                    <span class="w100 mb-4 text-align-center">Clique no botão "Carregar foto" para colocar uma imagem para esse produto</span>
                </div>

                <div class="form-group">
                    <label for="name">Nome</label>
                    <input id="name" name="name" class="form-control" type="text" placeholder="Nome" required="true" />
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea id="description" name="description" class="form-control" type="text" placeholder="Descrição" required="true"></textarea>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <button class="btn btn-primary"><i class="fas fa-check"></i> Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('importsBody')
<script src="{{URL::asset('/assets/js/recortImage.js')}}"></script>
<script src="{{URL::asset('/assets/js/jquery.validate.js')}}"></script>
<script src="{{URL::asset('/assets/js/validateFormProduct.js')}}"></script>
@endsection