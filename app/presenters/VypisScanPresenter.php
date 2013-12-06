<?php
use Nette\Application\UI\Form;
/**
 * Vypis všetkých scanov .
 */
class VypisScanPresenter extends BasePresenter
{

	private $kopieRepository;
	
	private $jednotka;
	private $ulozneJednotkyRepository;
	
        public function startup() {
            parent::startup();
            if (!$this->getUser()->isLoggedIn()){
		$this->redirect('Sign:in');
	    }
        }
        
	public function inject(SpravaRegistratury\KopieRepository $kopieRepository,
		SpravaRegistratury\Ulozne_JednotkyRepository $ulozneJednotkyRepository){
	    
	    $this->kopieRepository = $kopieRepository;
	    $this->ulozneJednotkyRepository = $ulozneJednotkyRepository;
	}
	
	
	
	public function renderDefault()
	{
		
	    $this->template->infoJednotka = $this->ulozneJednotkyRepository->findBy(array('id_jednotka' => $this->jednotka))->fetch();
		 
	}
	
	public function actionDefault($jednotka, $firma){
	    $this->jednotka = $jednotka;
	    $this->template->firma = $firma;
	    $this->template->subory = $this->kopieRepository->findSubory($jednotka);
	}
	
	

	
}



