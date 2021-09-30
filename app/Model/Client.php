<?php
App::uses('AppModel', 'Model');
class Client extends AppModel {
	
	public $validate = array(
		'username' => array(
			'checkNotEmpty' => array(
				'rule' => 'notBlank',
				'message' => 'Field is mandatory',
			),
			'checkNameLen' => array(
				'rule' => array('between', 3, 50),
				'message' => 'The name must be between 3 and 50 characters'
			)
		),
		'email' => array(
			'checkNotEmpty' => array(
				'rule' => 'notBlank',
				'message' => 'Field is mandatory',
			),
			'checkEmail' => array(
				'rule' => 'email',
				'message' => 'Email is incorrect'
			)
		),
		'phone' => array(
			'checkNotEmpty' => array(
				'rule' => array('notBlank'),
				'message' => 'Field is mandatory'
			),
			'checkDigitNumber' => array(
				'rule' => array('matchPhone'),
				'message' => 'Phone must contain 9 digits (code and number)'
			)
		)
	);

	public function matchPhone($data) {
		if (!preg_match("/^\d{9}$/", $data['phone'])) {
			return false;
		}
		return true;
	}

	public function beforeSave($options = array()) {
		if (isset($this->data['Client']['phone_prefix'])) {
			$this->data['Client']['phone'] = $this->data['Client']['phone_prefix'].$this->data['Client']['phone'];
		}
		return true;
	}

}
