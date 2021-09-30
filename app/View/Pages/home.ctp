<?
    $aTpls = array(
        '_home_services',
        '_home_consult',
        '_home_upcoming',
        '_home_events',
        '_home_pricing',
        '_home_register',
        '_home_shop',
        // '_home_gallery'
        '_home_updates'
    );
    $class = '';
    foreach($aTpls as $tpl) {
        $class = ($class) ? '' : 'bg-light';
        echo $this->element('../Pages/'.$tpl, compact('class'));
    }
