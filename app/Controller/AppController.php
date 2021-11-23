<?php
App::uses('Category', 'Model');
App::uses('Product', 'Model');
class AppController extends Controller {
	public $components = array(
		'Auth' => array(
			'authorize'      => array('Controller'),
			'loginAction'    => array('plugin' => '', 'controller' => 'pages', 'action' => 'home', '?' => array('login' => 1)),
			'loginRedirect'  => array('plugin' => '', 'controller' => 'user', 'action' => 'index'),
			'ajaxLogin' => 'Core.ajax_auth_failed',
			'logoutRedirect' => '/',
			'authError'      => 'You must sign in to access that page'
		),
	);

	protected $currUser, $aNavBar, $currMenu, $pageTitle = '', $aBreadcrumbs = array();

	public function __construct($request = null, $response = null) {
		$this->_beforeInit();
		parent::__construct($request, $response);
		$this->_afterInit();
	}

	protected function _beforeInit() {
		$this->helpers = array_merge(array('ArticleVars', 'Media', 'Settings', 'Breadcrumbs'), $this->helpers); // 'ArticleVars', 'Media.PHMedia', 'Core.PHTime', 'Media', 'ObjectType'
	}

	protected function _afterInit() {
		// after construct actions here
		$this->Settings = $this->loadModel('Settings');
		$this->Settings->initData();

		$this->aNavBar = array(
			'Home' => array('title' => __('Home'), 'url' => '/#home'), // array('controller' => 'Pages', 'action' => 'home')
			'Articles' => array('title' => __('Articles'), 'url' => '/#home'),
			// 'Events' => array('title' => __('Events'), 'url' => '/#upcoming'),
			'Services' => array('title' => __('Services'), 'url' => '/#services'),
			// 'Shop' => array('title' => __('Shop'), 'url' => array('controller' => 'Products', 'action' => 'index')),
			// 'Gallery' => array('title' => __('Gallery'), 'url' => '#gallery'),
			'About-us' => array('title' => __('About us'), 'url' => '/#about-us'), // array('controller' => 'pages', 'action' => 'view', 'about-us')
			// 'Articles' => array('title' => __('Articles'), 'url' => array('controller' => 'pages', 'action' => 'view', 'dealers')),
			'Contacts' => array('title' => __('Contacts'), 'url' => '/#consult'),
		);
	}

	public function loadModel($modelClass = null, $id = null) {
		if ($modelClass === null) {
			$modelClass = $this->modelClass;
		}

		$this->uses = ($this->uses) ? (array)$this->uses : array();
		if (!in_array($modelClass, $this->uses, true)) {
			$this->uses[] = $modelClass;
		}

		list($plugin, $modelClass) = pluginSplit($modelClass, true);

		$this->{$modelClass} = ClassRegistry::init(array(
			'class' => $plugin . $modelClass, 'alias' => $modelClass, 'id' => $id
		));
		if (!$this->{$modelClass}) {
			throw new MissingModelException($modelClass);
		}
		return $this->{$modelClass};
	}


	public function isAuthorized($user) {
		return Hash::get($user, 'active');
	}

	public function redirect404() {
		// return $this->redirect(array('controller' => 'pages', 'action' => 'notExists'), 404);
		throw new NotFoundException();
	}

	private function _getCurrMenu() {
		foreach($this->aNavBar as $curr => $item) {
			if ($this->request->controller == $item['url']['controller'] && $this->request->action == $item['url']['action']) {
				return $curr;
			}
		}
		return '';
	}

	public function beforeFilter() {
		$this->beforeFilterLayout();
	}

	public function beforeFilterLayout() {
		$this->currMenu = $this->_getCurrMenu();
		$this->Auth->allow(array('home', 'view', 'index', 'login'));
		$this->currUser = array();
		$this->cart = array();
	}

	public function beforeRender() {
		$this->beforeRenderLayout();
	}

	protected function beforeRenderLayout() {
		$this->set('currUser', $this->currUser);
		$this->set('aNavBar', $this->aNavBar);
		$this->set('currMenu', $this->currMenu);
		$this->set('pageTitle', $this->pageTitle);
		$this->set('aBreadcrumbs', $this->aBreadcrumbs);

		/*
		$this->Page = $this->loadModel('Page');
		$this->Media = $this->loadModel('Media.Media');
		$promoImages = array();
		foreach(array('PromoHeader', 'PromoLeft', 'PromoRight') as $objectType) {
			$promoImages[$objectType] = $this->Media->findByObjectType($objectType);
		}
		
		$this->Category = $this->loadModel('Category');
		$fields = array('Category.*', 'Media.*', '(SELECT COUNT(*) FROM products as Product WHERE Product.cat_id = Category.id AND Product.published = 1) AS count');
		$conditions = array('Category.published' => 1);
		$order = 'Category.sorting';
		$aCategories = Hash::combine($this->Category->find('all', compact('fields', 'conditions', 'order')), '{n}.Category.id', '{n}');

		$this->Tag = $this->loadModel('Tag');
		$order = 'Tag.sorting';
		$aTags = $this->Tag->find('list', compact('order'));

		$this->Product = $this->loadModel('Product');
		$conditions = array('Product.published' => 1);
		$limit = 3;
		$order = array('Product.created' => 'DESC');
		$aRecentProducts = $this->Product->find('all', compact('conditions', 'order', 'limit'));
		*/
		$this->Slider = $this->loadModel('Slider');
		$aSlides = $this->Slider->find('all');

		$conditions = array('published' => 1, 'featured' => 1);
		$order = array('modified' => 'desc');
		$aFeaturedArticles = $this->loadModel('SiteArticle')->find('all', compact('conditions', 'order'));

		// $this->set(compact('promoImages', 'aCategories', 'aTags', 'aRecentProducts', 'aSlides'));
		$this->set(compact('aSlides', 'aFeaturedArticles', 'aFeaturedNews'));
	}
/*
	protected function _refreshUser($lForce = false) {
		if ($lForce) {
			$this->loadModel('User');
			$user = $this->User->findById($this->currUser['id']);
			$this->Auth->login($user['User']);
		}

		$this->currUser = AuthComponent::user();
	}
*/
}
