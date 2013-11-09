<?php

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{

	private $userRepository;
	private $ulozneJednotkyRepository;

	
        public function startup() {
            parent::startup();
            if (!$this->getUser()->isLoggedIn()){
		$this->redirect('Sign:in');
	    }
        }
        
	public function inject(SpravaRegistratury\UzivateliaRepository $userRepository,
		SpravaRegistratury\Ulozne_JednotkyRepository $ulozneJednotkyRepository){
	    $this->userRepository = $userRepository;
	    $this->ulozneJednotkyRepository = $ulozneJednotkyRepository;
	    
	}
	
	
	
	public function renderDefault()
	{
		$this->template->users = $this->userRepository->findAll();
		$this->template->jednotky = $this->ulozneJednotkyRepository->findAll();
            
	}
	
	/**public function actionDefault($firma){
        $this->ulozneJednotky = $this->ulozne_JednotkyRepository->findByFirma($firma);
        if ($this->ulozneJednotky == FALSE){
            $this->setView('notFound');
        }
	 * 
	 */
    }  


