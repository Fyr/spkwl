<?
    $registered = isset($this->request->query['consult']);
?>
<a name="consult"></a>
<section class="ftco-section ftco-booking <?=$class?>">
    <div class="container ftco-relative">
        <div class="row justify-content-center pb-3">
            <div class="col-md-10 heading-section text-center ftco-animate">
                <span class="subheading"><?=__('Services')?></span>
                <h2 class="mb-4"><?=$aPages['home-appoint']['Page']['title']?></h2>
                <?=($registered) ? $aPages['consult-registered']['Page']['body'] : $aPages['home-appoint']['Page']['body']?>
            </div>
        </div>
        <h3 class="vr"><!--Call Us: 012-3456-7890--></h3>
        <div class="row justify-content-center">
<?
    if (!$registered) {
        echo $this->SiteForm->create('Client', array('url' => '#consult'));
        echo $this->SiteForm->hidden('consult', array('value' => 1));
        echo $this->SiteForm->input('username', array(
            'div' => 'col-sm-12', 
            'required' => true, 
            'label' => array('text' => __('Your name'))
        ));
        echo $this->SiteForm->input('email', array('required' => true));

        $prefixes = array('+375', '+7', '+380');
        echo $this->SiteForm->input('phone_prefix', array(
            'options' => array_combine($prefixes, $prefixes),
            'div' => 'col-sm-2', 
        ));
        echo $this->SiteForm->input('phone', array(
            'required' => true,
            'div' => 'col-sm-4'
        ));

        $options = array('' => ' - Выберите тему консультации - ');
        foreach(Hash::combine($aServices, '{n}.Service.id', '{n}.Service.title') as $key => $val) {
            $options[$key] = $val;
        }
        $options['0'] = 'Другое...';
        echo $this->SiteForm->input('service_id', array(
            'div' => 'col-sm-12', 
            'options' => $options,
            'label' => array('text' => __('Services'))
        ));
        echo $this->SiteForm->input('body', array(
            'type' => 'textarea',
            'div' => 'col-sm-12', 
            'label' => array('text' => __('Message'))
        ));
        echo $this->SiteForm->end(__('Make appointment'));
    }
?>
        </div>
    </div>
</section>
