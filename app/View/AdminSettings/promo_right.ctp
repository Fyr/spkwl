<?
	$title = __('Website');
	$subtitle = __('Promo right');
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
        __('Promo right') => $this->Html->div('form-body',
            $this->PHForm->input('promo_title_right', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Title'))))
            .$this->PHForm->input('promo_text_right', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Text'))))
            .$this->PHForm->input('promo_link_right', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Link'))))
        ),
        __('Media') => $this->Html->div('form-body',
            $this->element('Media.edit', array('object_type' => 'PromoRight', 'object_id' => 1))
        ),
    );

    echo $this->element('AdminUI/tabs', compact('tabs'));
	echo $this->element('AdminUI/form_save');
	echo $this->PHForm->end();
?>
		</div>
	</div>
</div>
