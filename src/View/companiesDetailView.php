<?php
require 'includes/header.php';
?>

<div class="company-detail">
	<h2>Company : <?= $company['companyName']; ?></h2>

	<section>
		<ul>
			<li>VAT : <?= $company['vatNumber']; ?></li>
			<li>Type : <?= $company['type']; ?></li>
		</ul>
	</section>

	<section>
		<h2>Contact person(s) :</h2>
		<div class="overflow">
			<table>
				<tr>
					<th>Name</th>
					<th>Phone</th>
					<th>Email</th>
				</tr>
				<?php foreach ($contacts as $contact) : ?>
					<tr>
						<td><?= $contact['firstName'] . " " . $contact['lastName']; ?></a></td>
						<td><?= $contact['phone']; ?></td>
						<td><?= $contact['email']; ?></td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</section>

	<section>
		<h2>Invoices :</h2>
		<div class="overflow">
			<table>
				<tr>
					<th>Invoice number</th>
					<th>Date</th>
					<th>Contact person</th>
				</tr>
				<?php foreach ($invoices as $invoice) : ?>
					<tr>
						<td><?= $invoice['invoiceNumber']; ?></a></td>
						<td><?= $invoice['invoiceDate']; ?></td>
						<td><?= $invoice['firstName'] . " " . $invoice['lastName']; ?></td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</section>
</div>

<?php
require 'includes/footer.php';
?>