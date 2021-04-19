<?php
require 'includes/header.php';
?>

<div class="invoice-detail">
	<h2>Invoice : <?= $_GET['invoiceNumber'] ?></h2>

	<section>
		<h2>Company linked to the invoice :</h2>
		<div class="overflow">
			<table>
				<tr>
					<th>Name</th>
					<th>VAT</th>
					<th>Company type</th>
				</tr>
				<tr>
					<td><?= $invoiceCompany['companyName']; ?></a></td>
					<td><?= $invoiceCompany['vatNumber']; ?></td>
					<td><?= $invoiceCompany['type']; ?></td>
				</tr>
			</table>
		</div>
	</section>
	<section>
		<h2>Contact person(s) :</h2>
		<div class="overflow">
			<table>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
				</tr>
				<?php foreach ($invoiceContacts as $invoiceContact) : ?>
					<tr>
						<td><?= $invoiceContact['firstName'] . " " . $invoiceContact['lastName']; ?></a></td>
						<td><?= $invoiceContact['email']; ?></td>
						<td><?= $invoiceContact['phone']; ?></td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</section>
</div>

<?php
require 'includes/footer.php';
?>