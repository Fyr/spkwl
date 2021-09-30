<?php
App::uses('AppModel', 'Model');
class User extends AppModel {
	
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
		),
		'password' => array(
			'checkNotEmpty' => array(
				'rule' => array('notBlank'),
				'message' => 'Field is mandatory'
			),
			'checkPswLen' => array(
				'rule' => array('between', 4, 15),
				'message' => 'The password must be between 4 and 15 characters'
			),
			'checkMatchPassword' => array(
				'rule' => array('matchPassword'),
				'message' => 'Your password and its confirmation do not match',
			)
		),
		'password_confirm' => array(
			'notempty' => array(
				'rule' => array('notBlank'),
				'message' => 'Field is mandatory',
			)
		)
	);

	public function matchPhone($data) {
		if (!preg_match("/^\d{9}$/", $data['phone'])) {
			// $this->invalidate('phone', $this->validate['phone']['checkDigitNumber']['message']);
			return false;
		}
		return true;
	}

	public function matchPassword($data){
		if($data['password'] == $this->data['User']['password_confirm']){
			return true;
		}
		$this->invalidate('password_confirm', $this->validate['phone']['checkMatchPassword']['message']);
		return false;
	}
	
	public function beforeValidate($options = array()) {
		if (Hash::get($options, 'validate')) {
			if (!Hash::get($this->data, 'User.password')) {
				$this->validator()->remove('password');
				$this->validator()->remove('password_confirm');
			}
		}
	}

	public function beforeSave($options = array()) {
		if (isset($this->data['User']['password'])) {
			if ($this->data['User']['password']) {
				$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
			} else {
				unset($this->data['User']['password']);
			}
		}
		if (isset($this->data['User']['phone_prefix'])) {
			$this->data['User']['phone'] = $this->data['User']['phone_prefix'].$this->data['User']['phone'];
		}
		return true;
	}

}
