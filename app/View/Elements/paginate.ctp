<?
	if ($this->Paginator->numbers()) {
		/*
		$options = array(
			'controller' => $this->request->controller,
			'action' => $this->request->action
		);
		*/
		$options = array();
		if ($this->request->query) {
			$options['url'] = array('?' =>$this->request->query);
		}
		$this->Paginator->options($options);

		$options = array(
			'tag' => 'li',
			'separator' => ' ',
			'currentClass' => 'active',
			'currentTag' => 'span'
		);
?>
	<ul>
		<li><?=__('Pages')?>: </li>
		<?=$this->Paginator->numbers($options)?>
	</ul>
<?
	}
?>