<?php

use Nette\Application\UI\Form;


/**
 * Sign in/out presenters.
 */
class SignPresenter extends BasePresenter
{


	/**
	 * Sign-in form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentSignInForm()
	{
		$form = new Form();
                $form->addText('username','Užívateľské meno:',30,20)
		    ->addRule(Form::FILLED,'Je nutné zadať užívateľské meno')
			    ->setAttribute('class','round full-width')
			    ->setAttribute('name','username')
			    ->setAttribute('placeholder','Užívateľské meno');
		
                $form->addPassword('password','Heslo:',30)
			->addRule(Form::FILLED,'Je nutné zadať heslo')
			->setAttribute('class','round full-width')
			->setAttribute('name','password')
			->setAttribute('placeholder','Heslo');
                $form->addSubmit('login','Prihlásiť sa')
			->setAttribute('class','button round blue text-upper image-right ic-right-arrow');
                $form->onSuccess[] = $this->signInFormSubmitted;
                return $form;
	}


	public function signInFormSubmitted(Form $form){
            try {
                $user = $this->getUser();
                $values = $form->getValues();
                $user->login($values->username,$values->password);
                $this->flashMessage('Prihlasenie bolo uspesne','success');
                $this->redirect('Homepage:');
            } catch (NS\AuthenticationException $e) {
                $form->addError('Neplatne uzivatelske meno alebo heslo.');
            }
            
        }

	public function signInFormSucceeded($form)
	{
		$values = $form->getValues();

		if ($values->remember) {
			$this->getUser()->setExpiration('14 days', FALSE);
		} else {
			$this->getUser()->setExpiration('20 minutes', TRUE);
		}

		try {
			$this->getUser()->login($values->username, $values->password);
			$this->redirect('Homepage:');

		} catch (Nette\Security\AuthenticationException $e) {
			$form->addError($e->getMessage());
		}
	}


	public function actionOut()
	{
		$this->getUser()->logout();
		$this->flashMessage('You have been signed out.');
		$this->redirect('in');
	}

}
