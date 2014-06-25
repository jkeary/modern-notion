<?php global $i; global $small_article_num_per_group; ?>
<?php if($i%2 == 1): ?>
	<div class="row">
<?php endif; ?>
	<div class="col-sm-6">
		<?php get_template_part('partials/content', 'article-block-small'); ?>
	</div>								
<?php if($i%2 == 0 || $i == $small_article_num_per_group): ?>
	</div>
<?php endif; ?>
<?php if($i%4 == 0): ?>											
	<img src="http://placehold.it/808x500&text=Advertisement" alt="" class="page-block">
<?php endif; ?>