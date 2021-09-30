<?php
App::uses('AppController', 'Controller');
App::uses('Media', 'Media.Model');
App::uses('SiteRouter', 'Lib/Routing');
class ProductsController extends AppController {
	public $name = 'Products';
	public $uses = array('Media.Media', 'Product', 'Category', 'ProductTag');

	const PER_PAGE = 6;

	public function beforeRender() {
		$this->currMenu = 'Shop';
		parent::beforeRenderLayout();
	}

	private function _getFilter() {
		$filter = array();

		if ($cat_id = $this->request->query('cat_id')) {
			$filter['Product.cat_id'] = $cat_id;
		}
		if ($q = $this->request->query('q')) {
			$filter['OR'] = array('Product.title LIKE ' => "%$q%", 'Product.teaser LIKE ' => "%$q%");
		}
		if ($tag_id = $this->request->query('tag_id')) {
			$rowset = $this->ProductTag->findAllByTagId($tag_id);
			$filter['Product.id'] = Hash::extract($rowset, '{n}.ProductTag.product_id');
		}
		return $filter;
	}

	public function index() {
		$filter = $this->_getFilter();
		$this->paginate = array(
				'conditions' => array_merge(array('Product.published' => 1), $filter),
				'order' => array('Product.modified' => 'DESC'),
				'limit' => self::PER_PAGE,
				'page' => $this->request->param('page')
		);
		$aProducts = $this->paginate('Product');
		$ids = Hash::extract($aProducts, '{n}.Product.id');
		$aProductTags = $this->ProductTag->getByProductIds($ids);
		$this->set(compact('aProducts', 'filter', 'aProductTags'));
	}

	public function view($id) {
		$article = $this->Product->findById($id);
		$aMedia = $this->Media->getList(
			array('object_type' => 'Product', 'object_id' => $id),
			array('created' => 'ASC')
		);
		$tags = Hash::extract($this->ProductTag->findAllByProductId($id), '{n}.ProductTag.tag_id');
		$this->set(compact('article', 'aMedia', 'tags'));
	}


}
