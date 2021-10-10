<?php
App::uses('AppModel', 'Model');
class Slider extends AppModel {

    public $hasOne = array(
        'Media' => array(
            'className' => 'Media.Media',
            'foreignKey' => 'object_id',
            'conditions' => array('Media.media_type' => 'image', 'Media.object_type' => 'Slider', 'Media.main' => 1),
            'dependent' => true
        )
    );

}
