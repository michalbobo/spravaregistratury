<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class VypozickyPresenter extends BasePresenter{
    
    
	
	private $vypozickyRepository;
	private $firmyRepository;
	private $regZnackyRepository;
	private $firma;

	
        public function startup() {
            parent::startup();
            if (!$this->getUser()->isLoggedIn()){
		$this->redirect('Sign:in');
	    }
        }
        
	public function inject(/**SpravaRegistratury\UzivateliaRepository $userRepository,**/
		SpravaRegistratury\VypozickyRepository $vypozickyRepository, SpravaRegistratury\FirmyRepository $firmyRepository,
		SpravaRegistratury\Reg_ZnackyRepository $regZnackyRepository){
	    $this->regZnackyRepository = $regZnackyRepository;
	  
	    $this->firmyRepository = $firmyRepository;
	}
	
	
	
	public function renderDefault()
	{
		
		
		//$this->template->users = $this->userRepository->findAll();
		//$this->template->jednotky = $this->ulozneJednotkyRepository->findAll()->limit(30);
		 $this->template->infoFirma = $this->firmyRepository->find($this->firma);
		
		
		    
	}
	
	public function actionDefault($firma){
	    $this->template->firma = $firma;
	    $this->firma = $firma;
	}
	
    
}