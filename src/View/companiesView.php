<?php
require 'includes/header.php';
?>
<label for="order-by">Order by:</label>
<div class="select-type">
	<select name="order-by" class="select" onclick="location = this.value;">
		<option value="index.php?page=companies&sort=client">Clients</option>
		<option value="index.php?page=companies&sort=provider">Suppliers</option>
		<option value="index.php?page=companies">All</option>
	</select>
</div>
<?php if ((isset($_GET['sort']) && $_GET['sort'] == 'client') || !isset($_GET['sort'])) : ?>
	<section class="companies-view">
		<h2>Clients :</h2>
		<div class="overflow">
			<table>
				<tr>
					<th>Name</th>
					<th>VAT</th>
					<th>Country</th>
					<?php if (isset($_SESSION['admin']) && $_SESSION['admin']) : ?>
						<th></th>
					<?php endif; ?>
				</tr>
				<?php foreach ($clients as $client) : ?>
					<tr>
						<td>
							<?php if (isset($_SESSION['admin']) && $_SESSION['admin']) : ?>
								<a href="?page=admin&mode=company&id=<?= $client['companyID'] ?>"><?= $client['companyName']; ?></a>
							<?php else : ?>
								<a href="?page=companies&id=<?= $client['companyID'] ?>"><?= $client['companyName']; ?></a>
							<?php endif; ?>
						</td>
						<td><?= $client['vatNumber']; ?></td>
						<td><?= $client['country']; ?></td>
						<?php if (isset($_SESSION['admin']) && $_SESSION['admin']) : ?>
							<td>
								<a href="index.php?page=admin&id=<?= $client['companyID'] ?>&mode=deleteInvoice"><i class="fa fa-trash"></i></a>
							</td>
						<?php endif; ?>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</section>
<?php endif; ?>

<?php if ((isset($_GET['sort']) && $_GET['sort'] == 'provider') || !isset($_GET['sort'])) : ?>
	<section class="companies-view">
		<h2>Suppliers :</h2>
		<div class="overflow">
			<table>
				<tr>
					<th>Name</th>
					<th>VAT</th>
					<th>Country</th>
					<?php if (isset($_SESSION['admin']) && $_SESSION['admin']) : ?>
						<th></th>
					<?php endif; ?>
				</tr>
				<?php foreach ($suppliers as $supplier) : ?>
					<tr>
						<td>
							<?php if (isset($_SESSION['admin']) && $_SESSION['admin']) : ?>
								<a href="?page=admin&mode=company&id=<?= $supplier['companyID'] ?>"><?= $supplier['companyName']; ?></a>
							<?php else : ?>
								<a href="?page=companies&id=<?= $supplier['companyID'] ?>"><?= $supplier['companyName']; ?></a>
							<?php endif; ?>
						</td>
						<td><?= $supplier['vatNumber']; ?></td>
						<td><?= $supplier['country']; ?></td>
						<?php if (isset($_SESSION['admin']) && $_SESSION['admin']) : ?>
							<td>
								<a href="index.php?page=admin&id=<?= $supplier['companyID'] ?>&mode=deleteInvoice"><i class="fa fa-trash"></i></a>
							</td>
						<?php endif; ?>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</section>
<?php endif; ?>
<?php
require 'includes/footer.php';
?>