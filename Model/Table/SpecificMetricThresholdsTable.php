<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SpecificMetricThresholds Model
 *
 * @property \App\Model\Table\SpecificMetricsTable|\Cake\ORM\Association\BelongsTo $SpecificMetrics
 * @property \App\Model\Table\MessagesTable|\Cake\ORM\Association\BelongsTo $Messages
 * @property \App\Model\Table\ThresholdColorsTable|\Cake\ORM\Association\BelongsTo $ThresholdColors
 *
 * @method \App\Model\Entity\SpecificMetricThreshold get($primaryKey, $options = [])
 * @method \App\Model\Entity\SpecificMetricThreshold newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SpecificMetricThreshold[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SpecificMetricThreshold|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SpecificMetricThreshold|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SpecificMetricThreshold patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SpecificMetricThreshold[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SpecificMetricThreshold findOrCreate($search, callable $callback = null, $options = [])
 */
class SpecificMetricThresholdsTable extends Table
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

        $this->setTable('specific_metric_thresholds');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('SpecificMetrics', [
            'foreignKey' => 'specific_metric_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Messages', [
            'foreignKey' => 'message_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ThresholdColors', [
            'foreignKey' => 'threshold_color_id',
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
            ->nonNegativeInteger('id')
            ->allowEmpty('id', 'create');

        $validator
            ->decimal('threshold')
            ->greaterThanOrEqual('threshold', 0)
            ->requirePresence('threshold', 'create')
            ->notEmpty('threshold');

        $validator
            ->decimal('threshold_incentive_percent')
            ->greaterThanOrEqual('threshold_incentive_percent', 0)
            ->requirePresence('threshold_incentive_percent', 'create')
            ->notEmpty('threshold_incentive_percent');

        $validator
            ->boolean('is_gateway_threshold')
            ->requirePresence('is_gateway_threshold', 'create')
            ->notEmpty('is_gateway_threshold');

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
        $rules->add($rules->existsIn(['message_id'], 'Messages'));
        $rules->add($rules->existsIn(['threshold_color_id'], 'ThresholdColors'));

        return $rules;
    }
}
