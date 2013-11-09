<?php
use Nette\Application\UI\Form;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PasswordPresenter extends BasePresenter{
     private $userRepository;
     private $authenticator;

    
    public function startup() {
            parent::startup();
            if (!$this->getUser()->isLoggedIn()){
		$this->redirect('Sign:in');
	    }
        }
    
    public function inject(SpravaRegistratury\UzivateliaRepository $userRepository, Authenticator $authenticator){
	    $this->userRepository = $userRepository;
	    $this->authenticator = $authenticator;
	}
	
	
	
	public function renderDefault()
	{
		$this->template->users = $this->userRepository->findAll();
		
            
	}
	
	 protected function createComponentPasswordForm(){
	 $form = new Form();
	 $form->addPassword('oldPassword','Staré heslo:', 30)
		 ->addRule(Form::FILLED,'Je nutné zadať heslo.');
	 $form->addPassword('newPassword','Nové heslo:', 30)
		 ->addRule(Form::MIN_LENGTH,'Nové heslo musí mat aspon %d znakov',6);
	 $form->addPassword('confirmPassword','Potvrdenie hesla:', 30)
		 ->addRule(Form::FILLED,'Nové heslo je nutné zadat znova pre potvrdenie.')
		 ->addRule(Form::EQUAL,'Zadané heslá sa musia zhodovat',$form['newPassword']);
	 $form->addSubmit('set','Zmeniť heslo')
		->setAttribute('class','round blue ic-right-arrow');
	 $form->onSuccess[] = $this->passwordFormSubmitted;
	 return $form;
     }
     
	public function passwordFormSubmitted($form){
	 $values = $form->getValues();
	 $user = $this->getUser();
	 try {
	     $this->authenticator->authenticate(array($user->getIdentity()->email,$values->oldPassword));
	     $this->userRepository->setPassword($user->getId(), $values->newPassword);
	     $this->flashMessage('Heslo bolo zmenené.', 'success');
             $this->redirect('Homepage:');
	 } catch (Security\AuthenticationException $e) {
		$form->addError('Zadané heslo nie je správne.');
	 }
     }
     

 
     
     
     
 }
	
	

	    

	
    
