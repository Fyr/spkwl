<?
App::uses('AppModel', 'Model');
class ProductTag extends AppModel {

    public function getByProductIds($ids) {
        $tags = $this->findAllByProductId($ids);
        $aProductTags = array();
        foreach($tags as $row) {
            $product_id = $row['ProductTag']['product_id'];
            $tag_id = $row['ProductTag']['tag_id'];
            if (!isset($aProductTags[$product_id])) {
                $aProductTags[$product_id] = array();
            }
            $aProductTags[$product_id][] = $tag_id;
        }
        return $aProductTags;
    }
}
