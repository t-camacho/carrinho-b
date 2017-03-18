<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Carrinho - Home</title>
	<link rel="stylesheet" href="../../public/style.css">
	<link href="https://fonts.googleapis.com/css?family=Inder" rel="stylesheet">
	<link rel="stylesheet" href="../../public/font-awesome/css/font-awesome.min.css">
</head>
<body>
	<header>
		<h1><i class="fa fa-shopping-bag" aria-hidden="true"></i> Shop</h1>
	</header>
	<div class="conteiner">
		<table>
			<tr>
				<th>#</th>
				<th>Produto</th>
				<th>Preço</th>
				<th>Ações</th>
			</tr>
			<?php foreach($products as $product): ?>
			<tr>
				<td><?php echo $product->getId(); ?></td>
				<td><?php echo $product->getName(); ?></td>
				<td><?php echo number_format($product->getPrice(), 2, ',', '.'); ?></td>
				<td>
					<form action="index.php?page=cart&action=add" method="post">
						<input type="text" name="c_id" hidden value="<?php echo $product->getId(); ?>">
						<button type="submit"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar</button>
					</form>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	</div>
	<footer>
		Copyright &copy Thais Camacho
	</footer>
</body>
</html>