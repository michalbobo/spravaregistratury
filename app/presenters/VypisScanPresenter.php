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
	private $uzivateliaRepository;
	
        public function startup() {
            parent::startup();
            if (!$this->getUser()->isLoggedIn()){
		$this->redirect('Sign:in');
	    }
        }
        
	public function inject(SpravaRegistratury\KopieRepository $kopieRepository,
		SpravaRegistratury\Ulozne_JednotkyRepository $ulozneJednotkyRepository,
		SpravaRegistratury\UzivateliaRepository $uzivateliaRepository){
	    
	    $this->kopieRepository = $kopieRepository;
	    $this->ulozneJednotkyRepository = $ulozneJednotkyRepository;
	    $this->uzivateliaRepository = $uzivateliaRepository;
	}
	
	
	
	public function renderDefault()
	{
		
	    $this->template->infoJednotka = $this->ulozneJednotkyRepository->findBy(array('id_jednotka' => $this->jednotka))->fetch();
		 
	}
	
	public function actionDefault($jednotka, $firma){
	     $aktUser = $this->uzivateliaRepository->find($this->getUser()->getId());
	    /* ak sa firma v parametri zhoduje so zamestnavatelom prihlaseneho uzivatela alebo je uzivatel admin */
	    if (($aktUser->zamestnavatel == $this->adminFirma) OR ($firma == $aktUser->zamestnavatel)){
		$this->jednotka = $jednotka;
		$this->template->firma = $firma;
		$this->template->subory = $this->kopieRepository->findSubory($jednotka);
	    } else {
		throw new Nette\Application\BadRequestException;
	    }
	    
	}
	
	

	
}



