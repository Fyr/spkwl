<?php
App::uses('AppController', 'Controller');
App::uses('PCAuth', 'Core.Controller/Component');
App::uses('PCTableGrid', 'Table.Controller/Component');
App::uses('PHForm', 'Form.View/Helper');
App::uses('PHTime', 'Core.View/Helper');
App::uses('PHTableGrid', 'Table.View/Helper');
class AdminController extends AppController {
	public $name = 'Admin';
	public $layout = 'admin';
	// public $components = array();
	public $uses = array();

	public function _beforeInit() {
	    // auto-add included modules - did not included if child controller extends AdminController
	    $this->components = array_merge(array('Auth', 'Core.PCAuth', 'Flash', 'Paginator', 'Table.PCTableGrid'), $this->components);
	    $this->helpers = array_merge(array('Html', 'Form', 'Form.PHForm', 'Core.PHTime', 'Table.PHTableGrid', 'ArticleVars'), $this->helpers);
	}
	
	public function beforeFilter() {
	}
	
	public function beforeRenderLayout() {
	    $aNavBar = array(
        		array('label' => __('Static content'), 'icon' => 'icon-layers', 'url' => '', 'submenu' => array(
        			array('label' => __('Pages'), 'url' => array('controller' => 'AdminPages', 'action' => 'index')),
        			array('label' => __('Services'), 'url' => array('controller' => 'AdminServices', 'action' => 'index')),
					array('label' => __('Feedbacks'), 'url' => array('controller' => 'AdminFeedbacks', 'action' => 'index')),
        			array('label' => __('News'), 'url' => array('controller' => 'AdminNews', 'action' => 'index')),
        		)),
				/*
        		array('label' => __('Shop'), 'icon' => 'icon-docs', 'url' => '', 'submenu' => array(
        			array('label' => __('Categories'), 'url' => array('controller' => 'AdminCategories', 'action' => 'index')),
        			array('label' => __('Tags'), 'url' => array('controller' => 'AdminTags', 'action' => 'index')),
        			array('label' => __('Products'), 'url' => array('controller' => 'AdminProducts', 'action' => 'index')),
        		)),
        		array('label' => __('Background tasks'), 'icon' => 'icon-paper-plane', 'url' => '', 'submenu' => array(
        			array('label' => __('Product Parser'), 'url' => array('controller' => 'AdminParser', 'action' => 'index')),
        		)),
        		*/
        		/*
        		array('label' => __('Users'), 'icon' => 'icon-user', 'url' => '', 'submenu' => array(
        			array('label' => __('User profiles'), 'url' => array('controller' => 'AdminUsers', 'action' => 'index')),
        			array('label' => __('Admin profile'), 'url' => array('controller' => 'AdminUsers', 'action' => 'edit', 1)),
        		)),
        		*/
        		array('label' => __('Settings'), 'icon' => 'icon-wrench', 'url' => '', 'submenu' => array(
        			// array('label' => __('System'), 'url' => array('controller' => 'AdminSettings', 'action' => 'index')),
        			array('label' => __('Contacts'), 'url' => array('controller' => 'AdminSettings', 'action' => 'contacts')),
					array('label' => __('Slider'), 'url' => array('controller' => 'AdminSlider', 'action' => 'index')),
        		)),
				/*
				array('label' => __('Website'), 'icon' => 'icon-globe', 'url' => '', 'submenu' => array(
        			array('label' => __('Header'), 'url' => array('controller' => 'AdminSettings', 'action' => 'pageHeader')),
        			array('label' => __('Promo left'), 'url' => array('controller' => 'AdminSettings', 'action' => 'promoLeft')),
					array('label' => __('Promo main'), 'url' => array('controller' => 'AdminSettings', 'action' => 'promoMain')),
					array('label' => __('Promo right'), 'url' => array('controller' => 'AdminSettings', 'action' => 'promoRight')),
					array('label' => __('Footer'), 'url' => array('controller' => 'AdminSettings', 'action' => 'pageFooter'))
        		)),*/
        	);
        $this->set('aNavBar', $aNavBar);
		$this->set('isAdmin', $this->isAdmin());
	}
	
	public function isAdmin() {
		return AuthComponent::user('id') == 1;
	}

	public function index() {
		//$this->redirect(array('controller' => 'AdminProducts'));
	}
	
	protected function _getCurrMenu() {
		$curr_menu = str_ireplace('Admin', '', $this->request->controller); // By default curr.menu is the same as controller name
		return $curr_menu;
	}

	public function delete($id) {
		$this->autoRender = false;
		$model = $this->request->query('model');
		if ($model) {
			$this->loadModel($model);
			if (strpos($model, '.') !== false) {
				list($plugin, $model) = explode('.',$model);
			}
			$this->{$model}->delete($id);
		}
		if ($backURL = $this->request->query('backURL')) {
			$this->redirect($backURL);
			return;
		}
		$this->redirect(array('controller' => 'Admin', 'action' => 'index'));
	}

}
