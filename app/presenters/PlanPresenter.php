<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PlanPresenter extends BasePresenter{
    
    private $userRepository;
	private $regZnackyRepository;
	private $firmyRepository;

	
        public function startup() {
            parent::startup();
            if (!$this->getUser()->isLoggedIn()){
		$this->redirect('Sign:in');
	    }
        }
        
	public function inject(SpravaRegistratury\UzivateliaRepository $userRepository,
		SpravaRegistratury\Reg_ZnackyRepository $regZnackyRepository,
		SpravaRegistratury\FirmyRepository $firmyRepository){
	    $this->userRepository = $userRepository;
	    $this->regZnackyRepository = $regZnackyRepository;
	    $this->firmyRepository = $firmyRepository;
	}
	
	
	
	public function renderDefault()
	{
		$this->template->users = $this->userRepository->findAll();
		//$this->template->znacky = $this->regZnackyRepository->findBy();
            
	}
	
	public function actionDefault($firma){
        $this->template->znacky = $this->regZnackyRepository->findBy(array('firma'=>$firma))->order('nazov ASC');
        if ($this->template->znacky == FALSE){
            $this->setView('notFound');
        }
	$this->template->firma = $firma;
	
	$this->template->titulok = $this->firmyRepository->find($firma);
	 
	}

}
    
    
    
    
