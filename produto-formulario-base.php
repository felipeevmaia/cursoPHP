<tr>
	<td>Nome:</td>
	<td><input type="text" name="nome" value="<?=$produto->nome?>"></td>
</tr>
<tr>
	<td>Preço:</td>
	<td><input type="number" name="preco" value="<?=$produto->preco?>" /></td>
</tr>
<tr>
	<td>Descrição:</td>
	<td><textarea name="descricao" class="form-control"><?=$produto->descricao?></textarea></td>
</tr>
<tr>
	<td></td>
	<td><input type="checkbox" name="usado" <?=$usado?> value="true">Usado</td>
</tr>
<tr>
	<td>Categoria:</td>
	<td><select name="categoria_id">
          <?php
            foreach ($categorias as $categoria) :
            $selecao = $produto->categoria->id == $categoria->id ? "selected='selected'" : "";
          ?>
    			<option value="<?=$categoria->id?>" <?=$selecao?>>
    				<?=$categoria->nome?>
    			</option>
		  <?php 
            endforeach 
          ?>
		</select></td>
</tr>