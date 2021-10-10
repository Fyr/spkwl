<?php
App::uses('AppModel', 'Model');
class Feedback extends AppModel {
    public $useTable = 'feedbacks';

    public $hasOne = array(
        'Media' => array(
            'className' => 'Media.Media',
            'foreignKey' => 'object_id',
            'conditions' => array('Media.media_type' => 'image', 'Media.object_type' => 'Feedback', 'Media.main' => 1),
            'dependent' => true
        )
    );
}
