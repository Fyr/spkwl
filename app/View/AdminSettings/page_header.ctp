<?
	$title = __('Website');
	$subtitle = __('Header');
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
        __('Header') => $this->Html->div('form-body',
            $this->PHForm->input('slogan_header', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Slogan header'))))
            .$this->PHForm->input('slogan_text', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Slogan text'))))
            .$this->PHForm->input('slogan_link_text', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Slogan link text'))))
            .$this->PHForm->input('slogan_link_url', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Slogan link URL'))))
        ),
        __('Media') => $this->Html->div('form-body',
            $this->element('Media.edit', array('object_type' => 'PromoHeader', 'object_id' => 1))
        )
    );

    echo $this->element('AdminUI/tabs', compact('tabs'));
	echo $this->element('AdminUI/form_save');
	echo $this->PHForm->end();
?>
		</div>
	</div>
</div>
