<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Facturas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Reservas
 * @property \Cake\ORM\Association\HasMany $FacturaProductos
 * @property \Cake\ORM\Association\HasMany $Recibos
 * @property \Cake\ORM\Association\HasMany $Remitos
 *
 * @method \App\Model\Entity\Factura get($primaryKey, $options = [])
 * @method \App\Model\Entity\Factura newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Factura[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Factura|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Factura patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Factura[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Factura findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FacturasTable extends Table
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

        $this->setTable('facturas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Reservas', [
            'foreignKey' => 'reserva_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('FacturaProductos', [
            'foreignKey' => 'factura_id'
        ]);
        $this->hasMany('Recibos', [
            'foreignKey' => 'factura_id'
        ]);
        $this->hasMany('Remitos', [
            'foreignKey' => 'factura_id'
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
        $rules->add($rules->existsIn(['reserva_id'], 'Reservas'));

        return $rules;
    }
}
