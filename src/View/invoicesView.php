<?php
require 'includes/header.php';
?>
<section class="invoices-view">
	<h2>Invoices :</h2>
	<div class="overflow">
		<table>
			<tr>
				<th>Number</th>
				<th>Date</th>
				<th>Company</th>
				<?php if (isset($_SESSION['admin']) && $_SESSION['admin']) : ?>
					<th></th>
				<?php endif; ?>
			</tr>
			<?php foreach ($invoices->getInvoices() as $invoice) : ?>
				<tr>
					<td>
						<?php if (isset($_SESSION['admin']) && $_SESSION['admin']) : ?>
							<a href="/index.php?page=admin&mode=invoice&id=<?= $invoice['company'] ?>&invoiceNumber=<?= $invoice['invoiceNumber'] ?>"><?= $invoice['invoiceNumber'] ?></a>
						<?php else : ?>
							<a href="/index.php?page=invoices&id=<?= $invoice['company'] ?>&invoiceNumber=<?= $invoice['invoiceNumber'] ?>"><?= $invoice['invoiceNumber'] ?></a>
						<?php endif; ?>
					</td>
					<td><?= $invoice['invoiceDate'] ?></td>
					<td><?= $invoice['companyName'] ?></td>
					<?php if (isset($_SESSION['admin']) && $_SESSION['admin']) : ?>
						<td>
							<a href="index.php?page=admin&id=<?= $invoice['invoiceID'] ?>&mode=deleteInvoice"><i class="fa fa-trash"></i></a>
						</td>
					<?php endif; ?>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
</section>
<?php
require 'includes/footer.php';
?>