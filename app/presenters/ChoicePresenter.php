<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ChoicePresenter extends BasePresenter{
    
    private $userRepository;
    
    public function startup() {
            parent::startup();
            if (!$this->getUser()->isLoggedIn()){
		$this->redirect('Sign:in');
	    }
        }
    
    public function inject(SpravaRegistratury\UzivateliaRepository $userRepository){
	    $this->userRepository = $userRepository;
	}
	
	
	
	public function renderDefault()
	{
		$this->template->users = $this->userRepository->findAll();
            
	    
	}
}