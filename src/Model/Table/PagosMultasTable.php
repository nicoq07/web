<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PagosMultas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $MultasUser
 * @property \Cake\ORM\Association\BelongsTo $MediosPagos
 *
 * @method \App\Model\Entity\PagosMulta get($primaryKey, $options = [])
 * @method \App\Model\Entity\PagosMulta newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PagosMulta[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PagosMulta|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PagosMulta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PagosMulta[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PagosMulta findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PagosMultasTable extends Table
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

        $this->setTable('pagos_multas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('MultasUser', [
            'foreignKey' => 'multas_user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('MediosPagos', [
            'foreignKey' => 'medio_pago_id',
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
            ->decimal('monto')
            ->allowEmpty('monto');

        $validator
            ->boolean('pagado')
            ->requirePresence('pagado', 'create')
            ->notEmpty('pagado');

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
        $rules->add($rules->existsIn(['multas_user_id'], 'MultasUser'));
        $rules->add($rules->existsIn(['medio_pago_id'], 'MediosPagos'));

        return $rules;
    }
}
