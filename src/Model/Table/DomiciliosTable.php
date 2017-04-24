<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Domicilios Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Personas
 * @property \Cake\ORM\Association\BelongsTo $Localidades
 * @property \Cake\ORM\Association\HasMany $Envios
 *
 * @method \App\Model\Entity\Domicilio get($primaryKey, $options = [])
 * @method \App\Model\Entity\Domicilio newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Domicilio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Domicilio|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Domicilio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Domicilio[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Domicilio findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DomiciliosTable extends Table
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

        $this->setTable('domicilios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Personas', [
            'foreignKey' => 'persona_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Localidades', [
            'foreignKey' => 'localidad_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Envios', [
            'foreignKey' => 'domicilio_id'
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
            ->requirePresence('piso', 'create')
            ->notEmpty('piso');

        $validator
            ->requirePresence('numero', 'create')
            ->notEmpty('numero');

        $validator
            ->requirePresence('direccion', 'create')
            ->notEmpty('direccion');

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
        $rules->add($rules->existsIn(['persona_id'], 'Personas'));
        $rules->add($rules->existsIn(['localidad_id'], 'Localidades'));

        return $rules;
    }
}
