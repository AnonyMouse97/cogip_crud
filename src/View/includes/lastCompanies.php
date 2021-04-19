<section class="last-companies">
	<div class="row">
		<div class="col-12 col-s-12">
			<h2>Last companies :</h2>
			<div class="overflow">
				<table>
					<tr>
						<th>Name</th>
						<th>VAT</th>
						<th>Country</th>
						<th>Type</th>
						<?php if (isset($_SESSION['admin']) && $_SESSION['admin']) : ?>
							<th></th>
						<?php endif; ?>
					</tr>
					<?php foreach ($companies as $company) : ?>
						<tr>
							<td>
								<?php if (isset($_SESSION['admin']) && $_SESSION['admin']) : ?>
									<a href="index.php?page=admin&mode=company&id=<?= $company['companyID'] ?>"><?= $company['companyName'] ?></a>
								<?php else : ?>
									<a href="index.php?page=companies&id=<?= $company['companyID'] ?>"><?= $company['companyName'] ?></a>
								<?php endif; ?>
							</td>
							<td><?= $company['vatNumber'] ?></td>
							<td><?= $company['country'] ?></td>
							<td><?= $company['type'] ?></td>
							<?php if (isset($_SESSION['admin']) && $_SESSION['admin']) : ?>
								<td><a href="index.php?page=admin&id=<?= $company['companyID'] ?>&mode=deleteCompany"><i class="fa fa-trash"></i></a></td>
						</tr>
					<?php endif; ?>
				<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
</section>