<?php
App::uses('AppHelper', 'View/Helper');
class ObjectTypeHelper extends AppHelper {
    public $helpers = array('Html');
    
    private function _getTitles() {
        $aTitles = array(
            'index' => array(
                'Article' => __('Articles'),
                'Page' => __('Static pages'),
                'News' => __('News'),
                'Service' => __('Services'),
                'Tag' => __('Tags'),
                'Category' => __('Categories'),
                'Subcategory' => __('Subcategories'),
                'Product' => __('Products'),
                'Slider' => __('Slider'),
            ),
            'create' => array(
                'Article' => __('Create article'),
                'Page' => __('Create static page'),
                'News' => __('Create news article'),
                'Service' => __('Create service'),
                'Tag' => __('Create tag'),
                'Category' => __('Create category'),
                'Subcategory' => __('Create subcategory'),
                'Product' => __('Create product'),
                'Slider' => __('Create slider'),
            ),
            'edit' => array(
                'Article' => __('Edit article'),
                'Page' => __('Edit static page'),
                'News' => __('Edit news article'),
                'Service' => __('Edit service'),
                'Tag' => __('Edit tag'),
                'Category' => __('Edit category'),
                'Subcategory' => __('Edit subcategory'),
                'Product' => __('Edit product'),
                'Slider' => __('Edit slider'),
            ),
            'view' => array(
            	'Article' => __('View article'),
            	'News' => __('View news article'),
            	'Product' => __('View product'),
            )
        );
        return $aTitles;
    }
    
    public function getTitle($action, $objectType) {
        $aTitles = $this->_getTitles();
        return (isset($aTitles[$action][$objectType])) ? $aTitles[$action][$objectType] : $aTitles[$action]['Article'];
    }
    
    public function getBaseURL($objectType, $objectID = '') {
        return $this->Html->url(array('action' => 'index', $objectType, $objectID));
    }
}