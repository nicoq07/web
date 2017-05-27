<?php 
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
use Cake\Mailer\Email;

class ContactForm extends Form
{

    protected function _buildSchema(Schema $schema)
    {
        return $schema->addField('name', 'string')
            ->addField('email', ['type' => 'string'])
            ->addField('body', ['type' => 'text']);
    }

    protected function _buildValidator(Validator $validator)
    {
        return $validator->add('name', 'length', [
                'rule' => ['minLength', 5],
                'message' => 'Necesitamos saber tu nombre!'
            ])->add('email', 'format', [
                'rule' => 'email',
                'message' => 'Cómo te contestamos si no tenemos tu correo?',
            ])->add('body', 'length', [
            		'rule' => ['minLength', 10],
            		'message' => 'Danos más datos para poder contestarte mejor!'
            ]);
    }

    protected function _execute(array $data)
    {
        // Send an email.
    	
    	$email = new Email();
    	$email
    	->setFrom($data['email'])
    	->setTo([$data['email'] => 'Web Contacto'])
    	->setSubject('Consulta '.  $data['name']);
    	if ($email->send($data['body']))
    	{
    		return true;
    	}
    }
}
?>