<?php
require_once("cabecalho.php");
require_once("banco-categoria.php");
require_once("logica-usuario.php");
require_once 'class/Produto.php';

verificaUsuario();

$produto = new Produto();
$categoria = new Categoria();
$categoria->id = 1;
$produto->nome = "";
$produto->descricao = "";
$produto->preco = "";
$produto->categoria->id = "1";
$produto->$usado = "";
$categorias = listaCategorias($conexao);
?>

<h1>Formulário de produto</h1>
<form action="adiciona-produto.php" method="post">
  <table class="table">
	<?php include("produto-formulario-base.php")?>
	<tr><td><input type="submit" value="Cadastrar"/></td></tr>
  </table>
</form>
<?php include("rodape.php");?>
