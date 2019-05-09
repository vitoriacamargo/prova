<style>
	.form{
		border:1px dashed black;
		background-color: #e2e2e2;
		width: 400px;		
	}
	.campos{
		width: 400px;
		height: 35px;
	}
</style>
<div class="form">
<h1>Cadastro de Notícia</h1>
<form action = "controllerNoticia.php" method="post">
	<label>Cliente: </label>
	<input type="text" name="cliente" class="campos"><br>
	<label>Vendedor: </label>
	<input type="text" name="vendedor" class="campos"><br>
	<label>Produto: </label>
	<input type="text" name="produto" class="campos"><br>
	<label>Data da compra: </label><br>
	<input type="date" name="dataCompra"><br>	
	<label>Descrição: </label>
	<textarea name="descricao" rows="4" cols="50"></textarea><br>
	<input type="submit" value="ENVIAR">
</form>
</div>