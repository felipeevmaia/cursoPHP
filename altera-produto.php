<?php 
require_once("cabecalho.php");
require_once("banco-produto.php");
require_once 'class/Produto.php';
require_once("class/Categoria.php");

$produto = new Produto();
$produto->nome = $_POST["nome"];
$produto->preco = $_POST["preco"];
$produto->descricao = $_POST["descricao"];
$categoria = new Categoria();
$categoria->id = $_POST["categoria_id"];
$produto->categoria = $categoria;

if(array_key_exists('usado',$_POST)) {
    $produto->usado = "true";
} else {
    $produto->usado = "false";
}

$produto->id = $_POST["id"];

if(alteraProduto($conexao, $produto)) { ?>
	<p class="text-success"> O produto <?php echo $produto->nome?>, R$ <?php echo $produto->preco?>  foi altera com sucesso!</p>

<?php } else { ?>
	<p class="text-danger"> O produto <?php echo $produto->nome?> não foi alterado.</p>
<?php
}

mysqli_close($conexao);
?>

<?php include("rodape.php");?>
