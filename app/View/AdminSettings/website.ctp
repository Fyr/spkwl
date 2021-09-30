<?
	$title = __('Website');
	$breadcrumbs = array(
		__('Settings') => 'javascript:;',
		$title => ''
	);
	echo $this->element('AdminUI/breadcrumbs', compact('breadcrumbs'));
	echo $this->element('AdminUI/title', array('title' => __('Settings')));
	echo $this->Flash->render();
?>

<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">

<?
	echo $this->element('AdminUI/form_title', compact('title'));
	echo $this->PHForm->create('Settings');

	$tabs = array(
        __('Header') => $this->Html->div('form-body',
            $this->PHForm->input('slogan_header', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Slogan header'))))
            .$this->PHForm->input('slogan_text', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Slogan text'))))
            .$this->PHForm->input('slogan_link_text', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Slogan link text'))))
            .$this->PHForm->input('slogan_link_url', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Slogan link URL'))))
        ),
        __('Header media') => $this->Html->div('form-body',
            $this->element('Media.edit', array('object_type' => 'PromoHeader', 'object_id' => 1))
        ),
        __('Promo left') => $this->Html->div('form-body',
            $this->PHForm->input('promo_title_left', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Title'))))
            .$this->PHForm->input('promo_text_left', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Text'))))
            .$this->PHForm->input('promo_link_left', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Link'))))
        ),
        __('Promo left media') => $this->Html->div('form-body',
            $this->element('Media.edit', array('object_type' => 'PromoLeft', 'object_id' => 1))
        ),
        __('Promo main') => $this->Html->div('form-body',
            $this->PHForm->input('promo_title_main', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Title'))))
            .$this->PHForm->input('promo_text_main', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Text'))))
            .$this->PHForm->input('promo_link_main', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Link'))))
        ),
        __('Promo right') => $this->Html->div('form-body',
            $this->PHForm->input('promo_title_right', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Title'))))
            .$this->PHForm->input('promo_text_right', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Text'))))
            .$this->PHForm->input('promo_link_right', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Link'))))
        ),
        __('Promo right media') => $this->Html->div('form-body',
            $this->element('Media.edit', array('object_type' => 'PromoRight', 'object_id' => 1))
        ),
        __('Footer') => $this->Html->div('form-body',
            $this->PHForm->input('worktime', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Work time'))))
        ),
    );

    echo $this->element('AdminUI/tabs', compact('tabs'));
	echo $this->element('AdminUI/form_save');
	echo $this->PHForm->end();
?>
		</div>
	</div>
</div>
