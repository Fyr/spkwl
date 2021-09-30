<?
	$title = __('Website');
	$subtitle = __('Promo main');
	$breadcrumbs = array(
		$title => 'javascript:;',
		$subtitle => ''
	);
	echo $this->element('AdminUI/breadcrumbs', compact('breadcrumbs'));
	echo $this->element('AdminUI/title', compact('title'));
	echo $this->Flash->render();
?>

<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">

<?
	echo $this->element('AdminUI/form_title', array('title' => $subtitle));
	echo $this->PHForm->create('Settings');

	$tabs = array(
        __('Promo main') => $this->Html->div('form-body',
            $this->PHForm->input('promo_title_main', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Title'))))
            .$this->PHForm->input('promo_text_main', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Text'))))
            .$this->PHForm->input('promo_link_main', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Link'))))
        ),
    );

    echo $this->element('AdminUI/tabs', compact('tabs'));
	echo $this->element('AdminUI/form_save');
	echo $this->PHForm->end();
?>
		</div>
	</div>
</div>
