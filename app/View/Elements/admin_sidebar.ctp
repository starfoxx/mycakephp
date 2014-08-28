<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">User Management</div>
						<div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Users'), array('controller' => 'users','action' => 'index'), array('escape' => false)); ?></li>
                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
                            </ul>
                        </div>
                    
                    <div class="panel-heading">Post Management</div>
                         <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Posts'), array('controller' => 'posts','action' => 'index'), array('escape' => false)); ?></li>
                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Post'), array('controller' => 'posts', 'action' => 'add'), array('escape' => false)); ?> </li>
                            </ul>
                        </div>
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->