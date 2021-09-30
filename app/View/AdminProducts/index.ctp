<?
    $title = __('Shop');
    $breadcrumbs = array(
        $title => 'javascript:;',
        $this->ObjectType->getTitle('index', $objectType) => ''
    );

    echo $this->element('AdminUI/breadcrumbs', compact('breadcrumbs'));
    echo $this->element('AdminUI/title', compact('title'));
    echo $this->Flash->render();

    $columns = $this->PHTableGrid->getDefaultColumns($objectType);
    $columns[$objectType.'.cat_id'] = array('key' => $objectType.'.cat_id', 'label' => __('Category'), 'format' => 'string');
    $columns[$objectType.'.id AS tags'] = array('key' => $objectType.'.tags', 'label' => __('Tags'), 'format' => 'string');
    $columns[$objectType.'.featured']['label'] = __('For home page');
    unset($columns['Media.*']);
    array_unshift($columns, array('key' => 'Media.image', 'label' => __('Photo'), 'format' => 'string', 'align' => 'center'));


    $rowset = $this->PHTableGrid->getDefaultRowset($objectType);
    foreach($rowset as &$row) {
        $src = $this->Media->imageUrl($row, '100x');
        $row['Media']['image'] = ($src) ? $this->Html->image($src, array('class' => 'admin-thumb')) : '';

        $row['Product']['cat_id'] = $aCategories[$row['Product']['cat_id']];

        $tags = array();
        foreach($row['ProductTag'] as $tag) {
            $tags[] = $aTags[$tag['tag_id']];
        }
        $row['Product']['tags'] = ($tags) ? implode('<br/>', $tags) : '';
    }
?>
<style>
    .table.dataTable > tbody > tr > td:first-child {
        text-align: center;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <?=$this->element('AdminUI/form_title', array('title' => $this->ObjectType->getTitle('index', $objectType)))?>
            <div class="portlet-body dataTables_wrapper">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="btn-group">
                                <a class="btn green" href="<?=$this->Html->url(array('action' => 'edit', 0))?>">
                                    <i class="fa fa-plus"></i> <?=$this->ObjectType->getTitle('create', $objectType)?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?=$this->PHTableGrid->render($objectType, compact('rowset', 'columns'))?>
            </div>
        </div>
    </div>
</div>
