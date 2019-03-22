<?php
require_once("conecta.php");
require_once("class/Produto.php");
require_once("class/Categoria.php");

function listaProdutos($conexao) {
	$produtos = array();
	$resultado = mysqli_query($conexao, "select p.*,c.nome as categoria_nome from produtos p
                join categorias c on c.id=p.categoria_id");
	while($produto_array = mysqli_fetch_assoc($resultado)){
		$produto = new Produto;
		$categoria = new Categoria();
		$categoria->nome = $produto_array['categoria_nome'];
		$produto->id = $produto_array['id'];
		$produto->nome = $produto_array['nome'];
		$produto->preco = $produto_array['preco'];
		$produto->descricao = $produto_array['descricao'];
		$produto->categoria = $categoria;
		$produto->usado =  $produto_array['usado'];

		array_push($produtos, $produto);
	}
	return $produtos;
}

function insereProduto($conexao, $produto){
    $produto->nome = mysqli_real_escape_string($conexao, $produto->nome);
    $produto->descricao = mysqli_real_escape_string($conexao, $produto->descricao);
	$query = "Insert into produtos (nome, preco, descricao, categoria_id,usado) values 
		('{$produto->nome}',{$produto->preco},'{$produto->descricao}',{$produto->categoria->id},{$produto->usado})";
	return mysqli_query($conexao,$query);
}

function removeProduto($conexao, $id){
	$query = "DELETE FROM produtos WHERE id={$id}";
	return mysqli_query($conexao,$query);
}

function buscaProduto($conexao,$id) {
	$query = "select * from produtos where id = {$id}";
	$resultado = mysqli_query($conexao,$query);
	$produto_array = mysqli_fetch_assoc($resultado);
	$categoria = new Categoria();
	$categoria->id = $produto_array["categoria_id"];
	$produto = new Produto();
	$produto->id = $produto_array["id"];
	$produto->nome = $produto_array["nome"];
	$produto->preco = $produto_array["preco"];
	$produto->descricao = $produto_array["descricao"];
	$produto->categoria = $categoria;
	$produto->usado = $produto_array["usado"];
	
	return $produto;
}

function alteraProduto($conexao, $produto){
    $produto->nome = mysqli_real_escape_string($conexao, $produto->nome);
    $produto->descricao = mysqli_real_escape_string($conexao, $produto->descricao);
	$query = "Update produtos set nome='{$produto->nome}', preco={$produto->preco}, descricao='{$produto->descricao}',
			 categoria_id={$produto->categoria->id},usado={$produto->usado} where id={$produto->id}";
	return mysqli_query($conexao,$query);
}