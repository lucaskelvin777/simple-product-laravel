<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Services\M2BRImagem;
use Services\Utils;

class ProductsController extends Controller
{
    public function home()
    {
        $products = new Products();
        $search = !empty($_GET['search']) ? filter_var(trim($_GET['search']), FILTER_SANITIZE_STRING) : null;
        if (!empty($search))
            $products =  $products->where('name', 'like', '%' . $search . '%');
        $products = $products->paginate(12);
        return view('home', ['products' => $products, 'search' => $search]);
    }
    public function register()
    {
        return view('register');
    }
    public function save(Request $request)
    {
        // Validação do input, os valores que são necessários para a continuação do script.
        $input  = \Validator::make($request->all(), [
            'name' => ['required', 'max:60'],
            'description' => ['required', 'max:3000'],
            'x' => ['nullable', 'numeric'],
            'y' => ['nullable', 'numeric'],
            'w' => ['nullable', 'numeric'],
            'h' => ['nullable', 'numeric']
        ], ['required' => 'O campo :attribute é requerido', 'max' => 'O campo muito extenso', 'numeric' => ':attribute deve  ser um campo valido'])->validate();
        // Salva o produto.
        $product = new Products();
        $product->name = $input['name'];
        //Salva a imagem e a recorta, caso necessário.
        $product->image = Utils::cropImage($request, $input);
        $product->description = $input['description'];
        $product->save();
        // Adiciona na sessão flash, uma mensagem, informando que foi salvo com sucesso
        session()->flash('message', "{$input['name']} salvo com sucesso!");
        return redirect('');
    }
    public function change(int $id)
    {
        $product = Products::where('id', $id)->first();
        if (empty($product))
            return redirect()->back()->withErrors(['msg' => 'Não foi possível encontrar nenhum produto com esse ID']);
        return view('change', ['product' => $product]);
    }
    public function update(Request $request)
    {
        $input  = \Validator::make($request->all(), [
            'name' => ['required', 'max:60'],
            'description' => ['required', 'max:3000'],
            'id' => ['required', 'integer'],
            'x' => ['nullable', 'numeric'],
            'y' => ['nullable', 'numeric'],
            'w' => ['nullable', 'numeric'],
            'h' => ['nullable', 'numeric']
        ], ['required' => 'O campo :attribute é requerido', 'max' => 'O campo muito extenso', 'numeric' => ':attribute deve ser um campo valido'])->validate();
        $product = Products::where('id', $input['id'])->first();
        if (empty($product))
            return redirect()->back()->withErrors(['msg' => 'Não foi possível encontrar nenhum produto com esse ID']);
        //Salva a imagem e a recorta, caso necessário.
        $nameImage = Utils::cropImage($request, $input);
        // Caso exista uma imagem anterior desse produto, deleta essa imagem do servidor.
        if (!empty($nameImage) && !empty($product->image))
            Utils::deleteFile(Utils::getPathImageProducts(), $product->image);
        $product->name = $input['name'];
        if (!empty($nameImage))
            $product->image = $nameImage;
        $product->description = $input['description'];
        $product->save();
        session()->flash('message', "{$input['name']} atualizado com sucesso!");
        return redirect('');
    }
}
