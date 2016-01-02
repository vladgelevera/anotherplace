<div class="container">
	<div class="page-header">
		<h1>Blog</h1>
	</div>
</div>
<div class="container">
	<?php foreach ($data as $post): ?>
		<div class="row">
			<div class="col-sm-12">
				<h2><a href="/blog/view/<?= $post['number'] ?>"><?= $post['date']; ?> - <?= $post['theme'] ?></a></h2>
				<?= $post['description']; ?>
			</div>
		</div>
	<?php endforeach ?>
</div>