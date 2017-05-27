<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Roles
 * @property \Cake\ORM\Association\HasMany $CalificacionesProductos
 * @property \Cake\ORM\Association\HasMany $Domicilios
 * @property \Cake\ORM\Association\HasMany $MultasUser
 * @property \Cake\ORM\Association\HasMany $PagosReserva
 * @property \Cake\ORM\Association\HasMany $Reservas
 * @property \Cake\ORM\Association\HasMany $Telefonos
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('presentacion');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Roles', [
            'foreignKey' => 'rol_id'
        ]);
        $this->hasMany('CalificacionesProductos', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Domicilios', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('MultasUser', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('PagosReserva', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Reservas', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Telefonos', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('TarjetasCreditoUser', [
            'foreignKey' => 'user_id'
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
            ->requirePresence('dni', 'create')
            ->notEmpty('dni')
            ->add('dni', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->requirePresence('apellido', 'create')
            ->notEmpty('apellido');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['dni']));
        $rules->add($rules->existsIn(['rol_id'], 'Roles'));

        return $rules;
    }
    public function findAuth(\Cake\ORM\Query $query, array $options)
    {
    	$query
    	->select(['id','nombre','apellido', 'email', 'password', 'rol_id'])
    	->where(['Users.active' => 1]);
    	return $query;
    }
}
