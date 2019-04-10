<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Metrics Model
 *
 * @property \App\Model\Table\PerformancesTable|\Cake\ORM\Association\HasMany $Performances
 * @property \App\Model\Table\SpecificMetricsTable|\Cake\ORM\Association\HasMany $SpecificMetrics
 *
 * @method \App\Model\Entity\Metric get($primaryKey, $options = [])
 * @method \App\Model\Entity\Metric newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Metric[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Metric|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Metric|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Metric patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Metric[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Metric findOrCreate($search, callable $callback = null, $options = [])
 */
class MetricsTable extends Table
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

        $this->setTable('metrics');
        $this->setDisplayField('metric');
        $this->setPrimaryKey('id');

        $this->hasMany('Performances', [
            'foreignKey' => 'metric_id'
        ]);
        $this->hasMany('SpecificMetrics', [
            'foreignKey' => 'metric_id'
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
            ->scalar('metric')
            ->maxLength('metric', 50)
            ->requirePresence('metric', 'create')
            ->notEmpty('metric');

        $validator
            ->scalar('metric_def')
            ->maxLength('metric_def', 16777215)
            ->requirePresence('metric_def', 'create')
            ->notEmpty('metric_def');

            $validator
            ->boolean('is_calculated_metric')
            ->requirePresence('is_calculated_metric', 'create')
            ->notEmpty('is_calculated_metric');

        return $validator;
    }
}
