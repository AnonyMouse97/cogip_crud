<section class="last-invoices">
	<div class="row">
		<div class="col-12 col-s-12">
			<h2>Last invoices :</h2>
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
					<?php foreach ($invoices as $invoice) : ?>
						<tr>
							<td>
								<?php if (isset($_SESSION['admin']) && $_SESSION['admin']) : ?>
									<a href="index.php?page=admin&mode=invoice&id=<?= $invoice['invoiceID'] ?>"><?= $invoice['invoiceNumber'] ?></a>
								<?php else : ?>
									<a href="index.php?page=invoices&id=<?= $invoice['company'] ?>&invoiceNumber=<?= $invoice['invoiceNumber'] ?>"><?= $invoice['invoiceNumber'] ?></a>
								<?php endif; ?>
							</td>
							<td><?= $invoice['invoiceDate'] ?></td>
							<td><?= $invoice['companyName'] ?></td>
							<?php if (isset($_SESSION['admin']) && $_SESSION['admin']) : ?>
								<td><a href="index.php?page=admin&id=<?= $invoice['invoiceID'] ?>&mode=deleteInvoice"><i class="fa fa-trash"></i></a></td>
						</tr>
					<?php endif; ?>
				<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
</section>