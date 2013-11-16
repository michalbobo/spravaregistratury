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
                $form->addText('username','Užívateľské meno:',30,30)
		    ->addRule(Form::FILLED,'Je nutné zadať užívateľské meno')
			->addRule(Form::EMAIL,'Užívateľské meno má tvar e-mailovej adresy')
			    ->setAttribute('class','round full-width')
			    ->setAttribute('name','username')
			    ->setAttribute('placeholder','vloz@adresu.tu');
		
                $form->addPassword('password','Heslo:',30)
			->addRule(Form::FILLED,'Je nutné zadať heslo')
			->setAttribute('class','round full-width')
			->setAttribute('name','password')
			->setAttribute('placeholder','Heslo')
			->setAttribute('autocomplete','off');
                $form->addSubmit('login','Prihlásiť sa')	
			->setAttribute('class','button round blue ic-right-arrow text-upper image-right');
                $form->onSuccess[] = $this->signInFormSubmitted;
                return $form;
	}


	public function signInFormSubmitted(Form $form){
            try {
                $user = $this->getUser();
                $values = $form->getValues();
                $user->login($values->username,$values->password);
                $this->flashMessage('Prihlásenie bolo úspešné','confirmation-box round');
                $this->redirect('Choice:');
            } catch (NS\AuthenticationException $e) {
                $form->addError('Neplatné užívateľské meno alebo heslo.');
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
			$this->redirect('Choice:');

		} catch (Nette\Security\AuthenticationException $e) {
			$form->addError($e->getMessage());
		}
	}


	public function actionOut()
	{
		$this->getUser()->logout();
		$this->flashMessage('Odhlásenie prebehlo úspešne.');
		$this->redirect('in');
	}

}
