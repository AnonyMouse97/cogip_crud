<?php
require 'includes/header.php';
?>
<section class="contact-view">
	<h2>Contact :</h2>
	<div class="overflow">
		<table>
			<tr>
				<th>Name</th>
				<th>Phone</th>
				<th>Email</th>
				<th>Company</th>
				<?php if (isset($_SESSION['admin']) && $_SESSION['admin']) : ?>
					<th></th>
				<?php endif; ?>
			</tr>
			<?php foreach ($contacts->getPeople() as $contact) : ?>
				<tr>
					<td>
						<?php if (isset($_SESSION['admin']) && $_SESSION['admin']) : ?>
							<a href="/index.php?page=admin&mode=contact&id=<?= $contact['company'] ?>&peopleID=<?= $contact['peopleID'] ?>"><?= $contact['firstName'] . " " . $contact['lastName'] ?></a>
						<?php else : ?>
							<a href="/index.php?page=contact&companyID=<?= $contact['company'] ?>&peopleID=<?= $contact['peopleID'] ?>"><?= $contact['firstName'] . " " . $contact['lastName'] ?></a>
						<?php endif; ?>
					</td>
					<td><?= $contact['phone'] ?></td>
					<td><?= $contact['email'] ?></td>
					<td><?= $contact['companyName'] ?></td>
					<?php if (isset($_SESSION['admin']) && $_SESSION['admin']) : ?>
						<td>
							<a href="index.php?page=admin&id=<?= $contact['peopleID'] ?>&mode=deleteInvoice"><i class="fa fa-trash"></i></a>
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