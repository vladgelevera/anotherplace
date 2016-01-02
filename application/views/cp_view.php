<div class="container">
	<div class="page-header">
		<h1>Control panel <a href="/admin/edit"><button type="submit" class="btn btn-default btn-lg">New post</button></a></h1>
	</div>
</div>
<div class="container post-content">
	<div class="row">
		<div class="col-sm-12">
			
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<table class="table post-content">
				<thead>
					<tr>
						<th class="col-xs-1">Post #</th>
						<th class="col-xs-2">Date</th>
						<th class="col-xs-7">Theme</th>
						<th class="col-xs-1">Edit</th>
						<th class="col-xs-1">Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data as $post): ?>
						<tr>
							<td><?= $post['number']; ?></td>
							<td><?= $post['date']; ?></td>
							<td><?= $post['theme']; ?></td>
							<td>
								<a href="/admin/edit/<?= $post['number']; ?>"><button type="submit" class="btn btn-default">Edit</button></a>
							</td>
							<td>
								<a href="/admin/delete/<?= $post['number']; ?>"><button type="submit" class="btn btn-default">Delete</button></a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>