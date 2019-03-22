<?php
require_once("cabecalho.php");
require_once("banco-produto.php");
require_once("logica-usuario.php");
?>

<table class="table table-striped table-bordered">
	<?php
	$produtos = listaProdutos($conexao);
	foreach($produtos as $produto) :
	?>
    	<tr>
    		<td><?= $produto->nome ?></td>
    		<td><?= $produto->preco?></td>
    		<td><?= substr($produto->descricao,0,50) ?></td>
    		<td><?= $produto->categoria->nome?></td>
    		<td><a class="btn btn-primary" href="produto-altera-formulario.php?id=<?=$produto->id?>">alterar</a></td>
    		<td><a class="btn btn-danger" href="remove-produto.php?id=<?=$produto->id?>">remover</a></td>
    		<td>
    		  <form action="remove-produto.php" method="post">
    			<input type="hidden" value="<?=$produto->id?>" name="id"/>
    		  	<button class="btn btn-danger">X</button>
    		  </form>
    		</td>
    	</tr>
	<?php
	endforeach
	?>
</table>

<?php include("rodape.php")?>
