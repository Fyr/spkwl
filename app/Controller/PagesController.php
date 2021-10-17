<?php
App::uses('AppController', 'Controller');
App::uses('Media', 'Media.Model');
class PagesController extends AppController {
	public $uses = array('Media.Media', 'Page', 'Service', 'Feedback', 'Faq');
	public $helpers = array('SiteForm');

	public function home() {
		/*
		// hot news
		$conditions = array('published' => 1, 'featured' => 1);
		$order = array('modified' => 'desc');
		$aNews = $this->News->find('all', compact('conditions', 'order'));
		*/
		$page = array(
			'home' => $this->Page->findBySlug('home'),
			'about-us' => $this->Page->findBySlug('about-us')
		);

		$order = array('sorting' => 'asc');
		$aServices = $this->Service->find('all', compact('order'));
		$aFeedbacks = $this->Feedback->find('all', compact('order'));
		$aFaq = $this->Faq->find('all', compact('order'));

		$this->set(compact('page', 'aServices', 'aFeedbacks', 'aFaq'));
/*
		if ($this->request->is(array('put', 'post'))) {
			fdebug($this->request->data, 'consult.log'); // to track why NULL records appear
			$this->Client = $this->loadModel('Client');

			$register = $this->request->data('Client.event_id');
			$service_id = $this->request->data('Client.service_id');
			$this->request->data('Client.service_id', intval($service_id));

			if ($this->Client->save($this->request->data)) {
				$route = ($register) 
					? array('?' => array('registered' => 'complete'), '#' => 'register') 
					: array('?' => array('consult' => 'complete'), '#' => 'consult');
				return $this->redirect($route);
			}
		}
		*/
	}

	public function view($slug) {
		$this->set('article', $this->Page->findBySlug($slug));
		// $this->currMenu = ucfirst($slug);
	}
}
