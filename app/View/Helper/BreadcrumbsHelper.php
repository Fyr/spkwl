<?php
App::uses('AppHelper', 'View/Helper');
// App::uses('SiteRouter', 'Lib/Routing');
class BreadcrumbsHelper extends AppHelper {

	public function getList() {
		if (ucfirst($this->request->controller) === 'Products') {
            $aCategories = $this->viewVar('aCategories');
			if ($this->request->action === 'index') {
                $filter = $this->viewVar('filter');
				if (isset($filter) && isset($filter['Product.cat_id'])) {
					$cat_id = $filter['Product.cat_id'];
					return array(
						__('Home') => '/',
						__('Shop') => array('controller' => 'Products', 'action' => 'index'),
						Hash::get($aCategories, "{$cat_id}.Category.title") => ''
					);
                }
			} elseif ($this->request->action === 'view') {
                $article = $this->viewVar('article'); 
                // $cat_id = $this->viewVar('article.Product.cat_id');
                $cat_id = $article['Product']['cat_id'];
		        $category = $aCategories[$cat_id]; 
				return array(
					__('Home') => '/',
					__('Shop') => array('controller' => 'Products', 'action' => 'index'), 
					$category['Category']['title'] => SiteRouter::url($category),
					$article['Product']['title'] => ''
				);
			}
            return array(
                __('Home') => '/',
                __('Shop') => ''
            );
		}
        return array();
	}

}
