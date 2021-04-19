<?php
require 'includes/header.php';
?>

<div class="contact-detail">
	<section>
		<h2>Contact : <?= $contact['firstName'] . " " . $contact['lastName']; ?></h2>
		<ul>
			<li>Contact : <?= $contact['firstName'] . " " . $contact['lastName']; ?></li>
			<li>Company : <?= $contact['companyName']; ?></li>
			<li>Email : <?= $contact['email']; ?></li>
			<li>Phone : <?= $contact['phone']; ?></li>
		</ul>
	</section>

	<section>
		<h2>Contact person(s) for these invoices :</h2>
		<div class="overflow">
			<table>
				<tr>
					<th>Number</th>
					<th>Date</th>
				</tr>
				<?php foreach ($contactInvoices as $contactInvoice) : ?>
					<tr>
						<td><?= $contactInvoice['invoiceNumber']; ?></a></td>
						<td><?= $contactInvoice['invoiceDate']; ?></td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</section>
</div>

<?php
require 'includes/footer.php';
?>