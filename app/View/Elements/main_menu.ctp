<ul class="<?=(isset($class)) ? $class : 'menu'?>">
<?
    foreach($aNavBar as $curr => $item) {
        $active = ($curr == $currMenu) ? '' : '';
?>
    <li class="main_nav_item<?=$active?>"><?=$this->Html->link(__($item['title']), $item['url'])?></li>
<?
    }
?>
</ul>