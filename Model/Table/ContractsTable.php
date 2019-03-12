<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contracts Model
 *
 * @property \App\Model\Table\ProvidersTable|\Cake\ORM\Association\BelongsTo $Providers
 * @property \App\Model\Table\PayCyclesTable|\Cake\ORM\Association\BelongsTo $PayCycles
 *
 * @method \App\Model\Entity\Contract get($primaryKey, $options = [])
 * @method \App\Model\Entity\Contract newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Contract[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Contract|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contract|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contract patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Contract[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Contract findOrCreate($search, callable $callback = null, $options = [])
 */
class ContractsTable extends Table
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

        $this->setTable('contracts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Providers', [
            'foreignKey' => 'provider_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('PayCycles', [
            'foreignKey' => 'pay_cycle_id',
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
            ->decimal('total_incentive_amount')
            ->greaterThanOrEqual('total_incentive_amount', 0)
            ->allowEmpty('total_incentive_amount');

        $validator
            ->decimal('fte')
            ->greaterThanOrEqual('fte', 0)
            ->allowEmpty('fte');

        $validator
            ->date('effective_date')
            ->allowEmpty('effective_date');

        $validator
            ->date('effective_quality_date')
            ->allowEmpty('effective_quality_date');

        $validator
            ->date('amendment_date')
            ->allowEmpty('amendment_date');

        $validator
            ->date('default_expire_date')
            ->allowEmpty('default_expire_date');

        $validator
            ->date('inactive_date')
            ->allowEmpty('inactive_date');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        $validator
            ->dateTime('datetime_stamp')
            ->requirePresence('datetime_stamp', 'create')
            ->notEmpty('datetime_stamp');

        $validator
            ->scalar('user')
            ->maxLength('user', 50)
            ->requirePresence('user', 'create')
            ->notEmpty('user');

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
        $rules->add($rules->existsIn(['pay_cycle_id'], 'PayCycles'));

        return $rules;
    }
}
