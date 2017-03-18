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
		<h1><i class="fa fa-shopping-cart" aria-hidden="true"></i> Carrinho</h1>
	</header>
	<div class="conteiner">
		<a href="index.php?page=home"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
		<table>
			<tr>
				<th>#</th>
				<th>Produto</th>
				<th>Quantidade</th>
				<th>Preço</th>
				<th>SubTotal</th>
				<th>Ações</th>
			</tr>
			<?php foreach($itemsCart as $item): ?>
			<tr>
				<td><?php echo $item->getProduct()->getId(); ?></td>
				<td><?php echo $item->getProduct()->getName(); ?></td>
				<td>
					<form class="quantity" method="post" action="index.php?page=cart&action=alterar">
						<input type="number" name="qtd" value="<?php echo $item->getQuantity(); ?>">
						<input type="text" hidden name="id" value="<?php echo $item->getProduct()->getId(); ?>">
						<button style="padding: 5px;" type="submit"><i class="fa fa-pencil" aria-hidden="true"></i> Alterar</button>
					</form>
				</td>
				<td><?php echo $item->getProduct()->getPrice(); ?></td>
				<td><?php echo number_format($item->getTotal(), 2, ',', '.') ?></td>
				<td>
					<form action="index.php?page=cart&action=deletar" method="post">
						<input type="text" hidden name="id" value="<?php echo $item->getProduct()->getId(); ?>">
						<button style="padding: 5px;" type="submit"><i class="fa fa-times" aria-hidden="true"></i> Deletar</button>
					</form>
				</td>
			</tr>
			<?php endforeach; ?>
			<tr>
				<td></td>
				<td>Total</td>
				<td colspan="2"></td>
				<td><?php echo number_format($itemsTotal, 2, ',', '.'); ?></td>
				<td></td>
			</tr>
		</table>
	</div>
</body>
</html>