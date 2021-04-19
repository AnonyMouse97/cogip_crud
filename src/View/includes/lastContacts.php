<section class="last-contact">
	<div class="row">
		<div class="col-12 col-s-12">
			<h2>Last contacts :</h2>
			<div class="overflow">
				<table>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Company</th>
						<?php if (isset($_SESSION['admin']) && $_SESSION['admin']) : ?>
							<th></th>
						<?php endif; ?>
					</tr>
					<?php foreach ($people as $contact) : ?>
						<tr>
							<td>
								<?php if (isset($_SESSION['admin']) && $_SESSION['admin']) : ?>
									<a href="index.php?page=admin&mode=contact&id=<?= $contact['peopleID'] ?>"><?= $contact['firstName'] . " " . $contact['lastName'] ?></a>
								<?php else : ?>
									<a href="index.php?page=contact&companyID=<?= $contact['company'] ?>&peopleID=<?= $contact['peopleID'] ?>"><?= $contact['firstName'] . " " . $contact['lastName'] ?></a>
								<?php endif; ?>
							</td>
							<td><?= $contact['email'] ?></td>
							<td><?= $contact['phone'] ?></td>
							<td><?= $contact['companyName'] ?></td>
							<?php if (isset($_SESSION['admin']) && $_SESSION['admin']) : ?>
								<td><a href="index.php?page=admin&id=<?= $contact['peopleID'] ?>&mode=deleteContact"><i class="fa fa-trash"></i></a></td>
						</tr>
					<?php endif; ?>
				<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
</section>