<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SpecificMetrics Model
 *
 * @property \App\Model\Table\ServiceLinesTable|\Cake\ORM\Association\BelongsTo $ServiceLines
 * @property \App\Model\Table\MetricsTable|\Cake\ORM\Association\BelongsTo $Metrics
 * @property \App\Model\Table\SpecificMetricThresholdsTable|\Cake\ORM\Association\HasMany $SpecificMetricThresholds
 *
 * @method \App\Model\Entity\SpecificMetric get($primaryKey, $options = [])
 * @method \App\Model\Entity\SpecificMetric newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SpecificMetric[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SpecificMetric|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SpecificMetric|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SpecificMetric patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SpecificMetric[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SpecificMetric findOrCreate($search, callable $callback = null, $options = [])
 */
class SpecificMetricsTable extends Table
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

        $this->setTable('specific_metrics');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('ServiceLines', [
            'foreignKey' => 'service_line_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Metrics', [
            'foreignKey' => 'metric_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('SpecificMetricThresholds', [
            'foreignKey' => 'specific_metric_id'
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
            ->boolean('threshold_direction')
            ->requirePresence('threshold_direction', 'create')
            ->notEmpty('threshold_direction');

        $validator
            ->boolean('is_gateway_metric')
            ->requirePresence('is_gateway_metric', 'create')
            ->notEmpty('is_gateway_metric');

        $validator
            ->scalar('year')
            ->requirePresence('year', 'create')
            ->notEmpty('year');

        $validator
            ->boolean('is_beta_metric')
            ->requirePresence('is_beta_metric', 'create')
            ->notEmpty('is_beta_metric');

        $validator
            ->boolean('is_service_line_metric')
            ->requirePresence('is_service_line_metric', 'create')
            ->notEmpty('is_service_line_metric');

        $validator
            ->boolean('is_tbd_metric')
            ->requirePresence('is_tbd_metric', 'create')
            ->notEmpty('is_tbd_metric');

        $validator
            ->nonNegativeInteger('metric_order')
            ->allowEmpty('metric_order');

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
        $rules->add($rules->existsIn(['service_line_id'], 'ServiceLines'));
        $rules->add($rules->existsIn(['metric_id'], 'Metrics'));

        return $rules;
    }
}
