<?
	$title = __('Contacts');
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
        __('General') => $this->Html->div('form-body',
            $this->PHForm->input('admin_email', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Admin email'))))
            // .$this->PHForm->input('teaser', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Teaser'))))
            //.$this->PHForm->input('sorting', array('class' => 'form-control input-small'))
        ),
        __('Contacts') => $this->Html->div('form-body',
            $this->PHForm->input('phone', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Phone'))))
            .$this->PHForm->input('email')
			.$this->PHForm->input('skype')
			.$this->PHForm->input('telegram')
        ),
        __('Social networks') => $this->Html->div('form-body',
            $this->PHForm->input('facebook', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Facebook'))))
            .$this->PHForm->input('instagram', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Instagram'))))
        ),
    );

    echo $this->element('AdminUI/tabs', compact('tabs'));
	echo $this->element('AdminUI/form_save');
	echo $this->PHForm->end();
?>
		</div>
	</div>
</div>

