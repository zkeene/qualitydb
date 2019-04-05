<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Performances Model
 *
 * @property \App\Model\Table\ProvidersTable|\Cake\ORM\Association\BelongsTo $Providers
 * @property \App\Model\Table\LocationsTable|\Cake\ORM\Association\BelongsTo $Locations
 * @property \App\Model\Table\MetricsTable|\Cake\ORM\Association\BelongsTo $Metrics
 *
 * @method \App\Model\Entity\Performance get($primaryKey, $options = [])
 * @method \App\Model\Entity\Performance newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Performance[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Performance|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Performance|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Performance patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Performance[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Performance findOrCreate($search, callable $callback = null, $options = [])
 */
class PerformancesTable extends Table
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

        $this->setTable('performances');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Providers', [
            'foreignKey' => 'provider_id'
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id'
        ]);
        $this->belongsTo('Metrics', [
            'foreignKey' => 'metric_id',
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
            ->nonNegativeInteger('numerator')
            ->requirePresence('numerator', 'create')
            ->notEmpty('numerator');

        $validator
            ->nonNegativeInteger('denominator')
            ->requirePresence('denominator', 'create')
            ->notEmpty('denominator');

        $validator
            ->nonNegativeInteger('quarter')
            ->requirePresence('quarter', 'create')
            ->notEmpty('quarter');

        $validator
            ->scalar('year')
            ->requirePresence('year', 'create')
            ->notEmpty('year');

        $validator
            ->nonNegativeInteger('import_error')
            ->allowEmpty('import_error');

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
        $rules->add($rules->existsIn(['provider_id'], 'Providers'));
        $rules->add($rules->existsIn(['location_id'], 'Locations'));
        $rules->add($rules->existsIn(['metric_id'], 'Metrics'));

        return $rules;
    }
}
