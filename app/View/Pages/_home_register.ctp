<?
    $registered = isset($this->request->query['registered']);
?>
<a name="register"></a>
<section class="ftco-section ftco-booking <?=$class?>">
    <div class="container ftco-relative">
        <div class="row justify-content-center pb-3">
            <div class="col-md-10 heading-section text-center ftco-animate">
                <span class="subheading">Регистрация на <?=$aPages['event-name']['Page']['title']?></span>
                <h2 class="mb-4"><?=$aPages['event-register']['Page']['title']?></h2>
                <?=($registered) ? $aPages['registered']['Page']['body'] : $aPages['event-register']['Page']['body']?>
            </div>
        </div>
        <h3 class="vr"><!--Call Us: 012-3456-7890--></h3>
        <div class="row justify-content-center">
<?
    if (!$registered) {
        echo $this->SiteForm->create('Client', array('url' => '#register'));
        echo $this->SiteForm->hidden('event_id', array('value' => 1));
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

        echo $this->SiteForm->end(__('Register'));
    }
?>
        </div>
    </div>
</section>
