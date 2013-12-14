<?php

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{

	public $adminFirma = 5;
	public $idAdmin = 1;
    
    public function handleSignOut(){
            $this->getUser()->logout();
            $this->redirect('Sign:in');
            
        }

public function beforeRender() {
    parent::beforeRender();
    if ($this->isAjax()) {
        $this->invalidateControl('flashMessages');
    }
}
    
}
