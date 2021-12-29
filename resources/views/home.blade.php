@extends('layouts/app')
@section('title', 'Home')
@section('importsHead')
<link rel="stylesheet" href="{{URL::asset('/assets/css/home.css')}}">
@endsection
@section('content')
<div class="container">
    <h1 class="">Produtos<span class="primary">.</span> </h1>
    <div class="d-flex justify-content-end mb-4">
        <a class="btn btn-primary" href="{{URL('/register')}}"><i class="fas fa-plus"></i> Adicionar produto</a>
    </div>
    <form action="" class="row mb-4">
        <div class="form-group col-md-6">
            <input type="text" placeholder="Pesquisa" name="search" value="{{$search}}" id="search" class="form-control">
        </div>
        <div class="col-md-6">
            <button class="btn btn-primary"><i class="fas fa-search"></i> Pesquisar</button>
        </div>
    </form>
    <div class="row">
        @if(!empty($products[0]))
        @foreach($products as $row) <div class="col-md-3 col-sm-12  mb-4">
            <div class="card col-md-12">
                <img class="card-img-top" src="{{empty($row->image) ? URL::asset('/assets/img/no-image.png') : URL::asset('/img/products/'.$row->image) }}" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{$row->name}}</h5>
                    <p class="card-text">{{$row->abbreviation_description}}</p>
                    <a href="{{URL('/change/'.$row->id)}}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Editar</a>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <h4>Não foram encontrados nenhum resultado{!! !empty($search) ? ' para ' . '<span class="primary">'.$search.'</span>' : ''!!}<span class="primary">!</span></h4>
        @endif
        <div class="d-flex justify-content-end">
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection