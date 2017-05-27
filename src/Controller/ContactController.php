<?php 
namespace App\Controller;

use App\Controller\AppController;
use App\Form\ContactForm;

class ContactController extends AppController
{
	public function index()
	{
		$contact = new ContactForm();
		if ($this->request->is('post')) {
			
			if ($contact->execute($this->request->getData())) {
				
				$this->Flash->success('Siempre tenemos una compu cerca, a la brevedad te contestamos! Gracias!');
			} else {
				$this->Flash->error('Algo salió mal. Sí podes reintentá!');
			}
		}
		$this->set('contact', $contact);
	}
}
?>