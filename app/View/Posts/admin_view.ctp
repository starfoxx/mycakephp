<div class="posts view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Post'); ?></h1>
			</div>
		</div>
	</div>

	<div class="row">

		<?php echo $this->element('admin_sidebar');?>

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($post['Post']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Title'); ?></th>
		<td>
			<?php echo h($post['Post']['title']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Body'); ?></th>
		<td>
			<?php echo h($post['Post']['body']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($post['Post']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($post['Post']['modified']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('User Id'); ?></th>
		<td>
			<?php echo h($post['Post']['user_id']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

