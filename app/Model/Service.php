<?php
App::uses('AppModel', 'Model');
class Service extends AppModel {

    public $hasOne = array(
        'Media' => array(
            'className' => 'Media.Media',
            'foreignKey' => 'object_id',
            'conditions' => array('Media.media_type' => 'image', 'Media.object_type' => 'Service', 'Media.main' => 1),
            'dependent' => true
        )
    );
}
