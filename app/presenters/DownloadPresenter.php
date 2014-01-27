<?php

/**
 * Blank page zabezpečujúci html GET header pre súbor a jeho korektné stiahnutie .
 */
class DownloadPresenter extends BasePresenter
{
    
	private $suboryRepository;
	private $subor;
	private $s;
	
        public function startup() {
	    
            parent::startup();
            if (!$this->getUser()->isLoggedIn()){
		$this->redirect('Sign:in');
	    }
	    
        }
        
	public function inject(SpravaRegistratury\SuboryRepository $suboryRepository){
	    
	    $this->suboryRepository = $suboryRepository;
	   
	}
	
	
	
	public function renderDefault()
	{
		
	    $this->s = $this->suboryRepository->find($this->subor);
	    header("Content-type: {$this->s->typ_suboru}");
	    header("Content-length: {$this->s->velkost}");
	    header("Content-Disposition: attachment; filename={$this->s->nazov}");
	    header("Content-Description: PHP Generated Data");
	    print $this->s->subor;
	    
	}
	
	public function actionDefault($subor){
	    
	    $this->subor = $subor;
	    
	}
	
	
	
	
}  


