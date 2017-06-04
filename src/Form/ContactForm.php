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
    	
    	$email = new Email('funclub');
    	$email
    	->setFrom($data['email'])
    	->setTo('fun.club.srl@gmail.com')
    	->setSubject('Web Contacto');
//     	debug($email); exit;
    	
    	if ($email->send($data['body']. "\n \n" .  $data['name'] . "\n" . $data['email']))
    	{
    		return true;
    	}
    }
}
?>