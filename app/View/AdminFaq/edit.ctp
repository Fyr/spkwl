<?
    $id = $this->request->data($objectType.'.id');
    $title = __('Static content');
    $breadcrumbs = array(
        $title => 'javascript:;',
        $this->ObjectType->getTitle('index', $objectType) => array('action' => 'index'),
        __('Edit') => ''
    );
    echo $this->element('AdminUI/breadcrumbs', compact('breadcrumbs'));
    echo $this->element('AdminUI/title', compact('title'));
    echo $this->Flash->render();
?>

<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">

<?
    echo $this->element('AdminUI/form_title', array('title' => $this->ObjectType->getTitle($id ? 'edit' : 'create', $objectType)));
    echo $this->PHForm->create($objectType);
    $tabs = array(
        __('General') => $this->Html->div('form-body',
            $this->PHForm->input('question')
            .$this->PHForm->input('sorting', array('class' => 'form-control input-small'))
        ),
        __('Answer') => $this->element('Article.edit_body', array('field' => 'answer')),
    );

    echo $this->element('AdminUI/tabs', compact('tabs'));
    echo $this->element('AdminUI/form_actions');
    echo $this->PHForm->end();
?>
        </div>
    </div>
</div>
