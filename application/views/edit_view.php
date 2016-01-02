<div class="container">
	<div class="page-header">
		<?php if (!empty($data['number'])): ?>
			<h1>Control panel - Edit post #<?= $data['number']; ?></h1>
		<?php else: ?>
			<h1>Control panel - Add new post</h1>
		<?php endif; ?>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<?php if (!empty($data['number'])): ?>
				<form class="form-horizontal" role="form" method="POST" action="/admin/update">
			<?php else: ?>
				<form class="form-horizontal" role="form" method="POST" action="/admin/insert">
			<?php endif; ?>
				<div class="form-group">
					<label class="control-label col-sm-2" for="number">Post number:</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="number" name="number" placeholder="Enter number" value="<?= $data['number']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="date">Date:</label>
					<div class="col-sm-4"> 
						<input type="date" class="form-control" id="date" name="date" placeholder="Enter date" value="<?= $data['date']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="theme">Theme:</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="theme" name="theme" placeholder="Enter theme" value="<?= $data['theme']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="description">Description:</label>
					<div class="col-sm-8"> 
						<textarea class="form-control" name="description" id="description" rows="5" placeholder="Add short description"><?= $data['description']; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="content">Content:</label>
					<div class="col-sm-8"> 
						<textarea class="form-control" name="content" id="content" rows="15" placeholder="Add post content"><?= $data['content']; ?></textarea>
					</div>
				</div>
				<input type="hidden" id="id" name="id" value="<?= $data['id']; ?>">
				<div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-10">
						<?php if (!empty($data['number'])): ?>
							<button type="submit" class="btn btn-default btn-lg">Edit</button>
						<?php else: ?>
							<button type="submit" class="btn btn-default btn-lg">Add</button>
						<?php endif; ?>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>