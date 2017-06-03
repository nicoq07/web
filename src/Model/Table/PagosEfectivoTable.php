<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PagosEfectivo Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Reservas
 * @property \Cake\ORM\Association\BelongsTo $Recibos
 *
 * @method \App\Model\Entity\PagosEfectivo get($primaryKey, $options = [])
 * @method \App\Model\Entity\PagosEfectivo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PagosEfectivo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PagosEfectivo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PagosEfectivo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PagosEfectivo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PagosEfectivo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PagosEfectivoTable extends Table
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

        $this->setTable('pagos_efectivo');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Reservas', [
            'foreignKey' => 'reserva_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Recibos', [
            'foreignKey' => 'recibo_id',
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
        $rules->add($rules->existsIn(['reserva_id'], 'Reservas'));
        $rules->add($rules->existsIn(['recibo_id'], 'Recibos'));

        return $rules;
    }
}
