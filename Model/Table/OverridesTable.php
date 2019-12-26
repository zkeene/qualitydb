<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Overrides Model
 *
 * @property \App\Model\Table\SpecificMetricsTable|\Cake\ORM\Association\BelongsTo $SpecificMetrics
 * @property \App\Model\Table\ProvidersTable|\Cake\ORM\Association\BelongsTo $Providers
 *
 * @method \App\Model\Entity\Override get($primaryKey, $options = [])
 * @method \App\Model\Entity\Override newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Override[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Override|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Override|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Override patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Override[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Override findOrCreate($search, callable $callback = null, $options = [])
 */
class OverridesTable extends Table
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
        $this->setTable('overrides');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('SpecificMetrics', [
            'foreignKey' => 'specific_metric_id'
        ]);
        $this->belongsTo('Providers', [
            'foreignKey' => 'provider_id'
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
            ->nonNegativeInteger('id')
            ->allowEmpty('id', 'create');

        $validator
            ->nonNegativeInteger('override_type')
            ->requirePresence('override_type', 'create')
            ->notEmpty('override_type');

        $validator
            ->nonNegativeInteger('time_frame')
            ->requirePresence('time_frame', 'create')
            ->notEmpty('time_frame');

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
        $rules->add($rules->existsIn(['specific_metric_id'], 'SpecificMetrics'));
        $rules->add($rules->existsIn(['provider_id'], 'Providers'));

        return $rules;
    }
}
