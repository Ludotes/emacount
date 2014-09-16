<div class="row">
    <div class="col-xs-12">
	<h2><?php echo __('Teams'); ?></h2>
	<table class="table">
                	<thead>
                	<tr>
                                	<th><?php echo $this->Paginator->sort('id'); ?></th>
                                	<th><?php echo $this->Paginator->sort('name'); ?></th>
                                	<th><?php echo $this->Paginator->sort('points'); ?></th>
                                	<th class="actions"><?php echo __('Actions'); ?></th>
                	</tr>
                	</thead>

                	<tbody>
                	<?php foreach ($teams as $team): ?>
                                	<tr>
                                		<td><?php echo h($team['Team']['id']); ?>&nbsp;</td>
                                		<td><?php echo h($team['Team']['name']); ?>&nbsp;</td>
                                		<td><?php echo h($team['Team']['points']); ?>&nbsp;</td>
                                		<td>
                                			<?php echo $this->Html->link(__('View'), array('action' => 'view', $team['Team']['id'])); ?>
                                			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $team['Team']['id'])); ?>
                                			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $team['Team']['id']), array(), __('Are you sure you want to delete # %s?', $team['Team']['id'])); ?>
                                		</td>
                                	</tr>
                            <?php endforeach; ?>
                	</tbody>
	</table>

	<p>
                	<?php
                                	echo $this->Paginator->counter(array(
                                	'format' => __('Page {:page} sur {:pages}, {:current} entrées sur {:count} en tout, commençant de l\'équipe  {:start} et finissant à l\'équipe {:end}')
                                	));
                	?>
            </p>
	<div class="paging">
                	<?php
                		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
                		echo $this->Paginator->numbers(array('separator' => ''));
                		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
                	?>
	</div>
    </div><!-- col -->
</div><!-- row -->

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Team'), array('action' => 'add')); ?></li>
	</ul>
</div>
