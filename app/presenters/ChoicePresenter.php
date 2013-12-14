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
    private $firmyRepository;
    private $userZamestnavatel;

    
    public function startup() {
            parent::startup();
            if (!$this->getUser()->isLoggedIn()){
		$this->redirect('Sign:in');
	    }
        }
    
    public function inject(SpravaRegistratury\UzivateliaRepository $userRepository, 
	    SpravaRegistratury\UlohyRepository $ulohyRepository,
	    SpravaRegistratury\FirmyRepository $firmyRepository){
	    $this->userRepository = $userRepository;
	    $this->ulohyRepository = $ulohyRepository;
	    $this->firmyRepository = $firmyRepository;
	}
	
	
	
	public function renderDefault()
	{	
		$this->userZamestnavatel = $this->userRepository->find($this->getUser()->getId());
		$this->template->users = $this->userRepository->findAll();
		$this->template->ulohy = $this->ulohyRepository->findIncompleteByUser($this->getUser()->getId());
		
		if($this->userZamestnavatel->zamestnavatel == $this->adminFirma){
		    $this->template->firmy = $this->firmyRepository->findAll()->order('nazov ASC');
		    $this->template->admin = TRUE;
		} else {
		    $this->template->firmy = $this->firmyRepository->findAll()
			    ->where(array('id_firma' => $this->userZamestnavatel->zamestnavatel))->order('nazov ASC');
		    $this->template->admin = FALSE;
		}
	}
	
	public function handleMarkDone($idUloha){
	    $this->ulohyRepository->markDone($idUloha);
	    if(!$this->isAjax()){
		$this->redirect('this');
	    } else {
		$this->invalidateControl();
	    }
	}
	
	public function createComponentAddUlohaForm(){
        
        
        
        $form = new Form();
       
	
	$form->addDate('datum', 'Dátum:',  \Vodacek\Forms\Controls\DateInput::TYPE_DATE)
		->setAttribute('class','round')
		->addRule(Form::RANGE,'Úlohu je možné nastaviť na akýkoľvek dátum dnes alebo v budúcnosti.',array(new \DateTime('today'), NULL));
	/*$form->addText('datum','Dátum:')
	*    ->setAttribute('placeholder','YYYY-MM-DD');
	*/	
        $form->addText('popis','Úloha:')
		->addRule(Form::FILLED,'Je nutné zadať úlohu!')
		
		->setAttribute('class','round default-width-input')
		->setAttribute('placeholder','Moja nová úloha');
		
        $form->addSubmit('pridat','Pridať úlohu')
		->setAttribute('class',' ic-right-arrow round blue text-upper image-right ajax');
		
        $form->onSuccess[] = $this->addUlohaFormSubmitted;
        return $form;
	 }
	
	public function addUlohaFormSubmitted(Form $form){
	
	$this->ulohyRepository->createNewUloha($form->values->datum, $form->values->popis, $this->getUser()->getId() );
	$this->flashMessage('Úloha úspesne pridaná!','confirmation-box round');
	
	if (!$this->isAjax()){
	redirect('this');  
	} else {
	    $form->setValues(array(),TRUE);
            $this->invalidateControl('form');
	    $this->invalidateControl();
	}
	}
	    

	
}