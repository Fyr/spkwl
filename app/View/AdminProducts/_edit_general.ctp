<?
	echo $this->element('AdminUI/checkboxes', array('labels' => array('published' => __('Published'), 'featured' => __('For home page'))));
	echo $this->PHForm->input('cat_id', array(
		'options' => $aCategories,
		'value' => $this->request->data('Product.cat_id'),
		'label' => array('class' => 'col-md-3 control-label', 'text' => __('Category'))
	));
	echo $this->PHForm->input('title');
	echo $this->PHForm->input('teaser');
	// echo $this->PHForm->input('sorting', array('class' => 'form-control input-small'));

	$checkboxes = array();
	$labels = array();
	$values = array();
	foreach($aTags as $tag_id => $tag) {
		$modelField = "ProductTag.".$tag_id;
		$checkboxes[] = $modelField;
		$labels[$modelField] = $tag;
	}
	if ($this->request->data('ProductTag')) {
		foreach ($this->request->data('ProductTag') as $tag) {
			$modelField = "ProductTag.".$tag['tag_id'];
			$this->request->data($modelField, 1);
		}
	}
	$title = __('Tags');
	echo $this->element('AdminUI/checkboxes', compact('title', 'checkboxes', 'labels', 'values'));
