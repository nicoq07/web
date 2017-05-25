<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TipoTelefonos Model
 *
 * @property \Cake\ORM\Association\HasMany $Telefonos
 *
 * @method \App\Model\Entity\TipoTelefono get($primaryKey, $options = [])
 * @method \App\Model\Entity\TipoTelefono newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TipoTelefono[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TipoTelefono|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TipoTelefono patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TipoTelefono[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TipoTelefono findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TipoTelefonosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('tipo_telefonos');
        $this->setDisplayField('descripcion');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Telefonos', [
            'foreignKey' => 'tipo_telefono_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('descripcion', 'create')
            ->notEmpty('descripcion');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        return $validator;
    }
}
