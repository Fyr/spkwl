<?php
//App::uses('AppHelper', 'View/Helper');
App::uses('FormHelper', 'View/Helper');

class SiteFormHelper extends FormHelper {

	public function create($model, $options = array()) {
		$options['class'] = (isset($options['class']) && $options['class']) ? $options['class'] : 'appointment-form';
		$options['inputDefaults'] = (isset($options['inputDefaults']) && $options['inputDefaults']) ? $options['inputDefaults'] : array(
			'div' => 'col-sm-6',
			'class' => 'form-control',
			// 'label' => false,
			'between' => '<div class="form-group">',
			'after' => '</div>',
			//'error' => array('attributes' => array('wrap' => 'div', 'class' => 'col-md-9'))
		);
		
		// Fix validation errors translation
		foreach($this->validationErrors as $_model => $fields) {
			if (is_array($fields)) {
				foreach($fields as $field => $messages) {
					foreach($messages as $i => $msg) {
						$this->validationErrors[$_model][$field][$i] = __($msg);
					}
				}
			}
		}
		return '<div class="col-md-10 ftco-animate">'.parent::create($model, $options).'<div class="row">';
	}

	public function end($options = null, $secureAttributes = array()) {
		return '</div>'.parent::end($options, $secureAttributes).'</div>';
	}

    protected function _getLabelText($fieldName, $text = null) {
        if (strpos($fieldName, '.') !== false) {
            $fieldName = array_pop(explode('.', $fieldName));
        }
        if ($text === null) {
            $text = __(Inflector::humanize(Inflector::underscore($fieldName)));
        }
        return array('name' => $fieldName, 'text' => $text);
    }

	public function input($fieldName, $options = array()) {
		$this->setEntity($fieldName);
		$options = $this->_parseOptions($options);

        // $label = $this->_getLabelText($fieldName);
        $label = (isset($options['label'])) ? $options['label'] : $this->_getLabelText($fieldName);

        $options['placeholder'] = (isset($options['placeholder'])) ? $options['placeholder'] : $label['text'];
        $options['label'] = false;
        if ($options['type'] === 'select') {
            $options['between'] = '<div class="form-group"><div class="select-wrap"><div class="icon"><span class="ion-ios-arrow-down"></span></div>';
            $options['after'] = '</div></div>';
        }
        /*
		if ($options['type'] == 'checkbox') {
			$options['format'] = array('before', 'label', 'between', 'input', 'after', 'error');
		} elseif ($options['type'] == 'text' || $options['type'] == 'textarea') {
			$options = array_merge(array('class' => 'input-xxlarge'), $options);
		} elseif ($options['type'] == 'file') {
			$options['class'] = '';
			if (isset($options['help-block'])) {
				$options['after'] = '<p class="help-block small">'.$options['help-block'].'</p></div>';
			}
		}
        */
		return parent::input($fieldName, $options);
	}

	public function submit($fieldName = 'Save', $options = array()) {
		$options = array_merge(array('class' => 'btn btn-primary', 'div' => array('class' => 'form-group')), $options);
        return parent::submit($fieldName, $options);
	}

/*	
	public function button($fieldName, $options = array()) {
	    $options = array_merge(array('class' => 'btn defalut', 'type' => 'button', 'div' => false), $options);
		return parent::button($fieldName, $options);
	}

	public function date($fieldName, $options = array()) {
		$this->Html->script('vendor/xdate', array('inline' => false));
		$this->setEntity('_'.$fieldName);
		$options = $this->_parseOptions($options);
		$options['between'].= '<div class="input-group input-small date date-picker">';
		$button = '<span class="input-group-btn"><button type="button" class="btn default"><i class="fa fa-calendar"></i></button></span>';
		$options['after'] = $this->hidden($fieldName).$button.'</div>'.$options['after'];
		return $this->input('_'.$fieldName, $options);
	}

	public function inlineCheckboxes($checkboxes) {

	}

	public function textOnly($label, $text) {
		return $this->_View->element('Form.form_text', compact('label', 'text'));
	}
    */
}
