<?
	/*
	$title = $this->ObjectType->getTitle('index', 'Subcategory');
	echo $this->Html->link('<i class="fa fa-folder"></i> '.$title, array('controller' => 'AdminSubcategories', 'action' => 'index', $id), array(
		'class' => 'btn btn-outline dark btn-sm blue',
		'escape' => false
	));
	*/
	echo $this->Html->link('<i class="fa fa-edit"></i> '.__('Edit'), array('action' => 'edit', $id), array(
			'class' => 'btn btn-outline dark btn-sm green',
			'escape' => false
	));
	echo $this->Html->link('<i class="fa fa-trash-o"></i> '.__('Delete'), array('action' => 'delete', $id), array(
		'class' => 'btn btn-outline dark btn-sm red',
		'escape' => false,
		'confirm' => __('Are you sure to delete this record?')
	));