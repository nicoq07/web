<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TarjetasCreditoUser Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\TarjetasCreditoUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\TarjetasCreditoUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TarjetasCreditoUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TarjetasCreditoUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TarjetasCreditoUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TarjetasCreditoUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TarjetasCreditoUser findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TarjetasCreditoUserTable extends Table
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

        $this->setTable('tarjetas_credito_user');
        $this->setDisplayField(['presentacion']);
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
            ->integer('numero')
            ->requirePresence('numero', 'create')
            ->notEmpty('numero');

        $validator
            ->integer('vencimientoMes')
            ->requirePresence('vencimientoMes', 'create')
            ->notEmpty('vencimientoMes');

        $validator
            ->integer('vencimientoAnio')
            ->requirePresence('vencimientoAnio', 'create')
            ->notEmpty('vencimientoAnio');

        $validator
            ->integer('codSeguridad')
            ->requirePresence('codSeguridad', 'create')
            ->notEmpty('codSeguridad');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
