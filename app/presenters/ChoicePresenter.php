<?php
use Nette\Application\UI\Form;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ChoicePresenter extends BasePresenter{
    
    private $userRepository;
    private $ulohyRepository;

    
    public function startup() {
            parent::startup();
            if (!$this->getUser()->isLoggedIn()){
		$this->redirect('Sign:in');
	    }
        }
    
    public function inject(SpravaRegistratury\UzivateliaRepository $userRepository, SpravaRegistratury\UlohyRepository $ulohyRepository){
	    $this->userRepository = $userRepository;
	    $this->ulohyRepository = $ulohyRepository;
	}
	
	
	
	public function renderDefault()
	{
		$this->template->users = $this->userRepository->findAll();
		$this->template->ulohy = $this->ulohyRepository->findIncompleteByUser($this->getUser()->getId());
            
	}
	
	public function handleMarkDone($idUloha){
	    $this->ulohyRepository->markDone($idUloha);
	    if(!$this->isAjax()){
		$this->redirect('this');
	    } else {
		$this->invalidateControl();
	    }
	}
	
	protected function createComponentAddUlohaForm(){
        
        
        
        $form = new Form();
        $form->addText('datum','Dátum:')
		->addRule(Form::VALID, 'Zadaný dátum nie je platný!')
		->setAttribute('placeholder','YYYY-MM-DD')
		->setAttribute('style','display:inline');
        $form->addText('popis','Úloha')
		->addRule(Form::FILLED,'Je nutné zadať úlohu!')
		->setAttribute('style','display:inline')
		->setAttribute('class','round default-width-input')
		->setAttribute('placeholder','Moja nová úloha');
        $form->addSubmit('pridat','Pridať úlohu')
		->setAttribute('class','round blue ic-right-arrow ajax');
        $form->onSuccess[] = $this->addUlohaFormSubmitted;
        return $form;
	 }
	
	public function addUlohaFormSubmitted(Form $form){
	    
	$this->ulohyRepository->createNewUloha($form->values->datum, $form->values->popis, $this->getUser()->getId() );
        
	    
	    $this->redirect('this');
	   
	}
	    

	
}