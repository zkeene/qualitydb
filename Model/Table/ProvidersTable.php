<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Providers Model
 *
 * @property \App\Model\Table\ServiceLinesTable|\Cake\ORM\Association\BelongsTo $ServiceLines
 * @property \App\Model\Table\ProviderTypesTable|\Cake\ORM\Association\BelongsTo $ProviderTypes
 * @property \App\Model\Table\ContractsTable|\Cake\ORM\Association\HasMany $Contracts
 * @property \App\Model\Table\PerformancesTable|\Cake\ORM\Association\HasMany $Performances
 *
 * @method \App\Model\Entity\Provider get($primaryKey, $options = [])
 * @method \App\Model\Entity\Provider newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Provider[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Provider|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Provider|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Provider patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Provider[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Provider findOrCreate($search, callable $callback = null, $options = [])
 */
class ProvidersTable extends Table
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

        $this->setTable('providers');
        $this->setDisplayField('provider_name');
        $this->setPrimaryKey('id');

        $this->belongsTo('ServiceLines', [
            'foreignKey' => 'service_line_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ProviderTypes', [
            'foreignKey' => 'provider_type_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Contracts', [
            'foreignKey' => 'provider_id'
        ]);
        $this->hasMany('Performances', [
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
            ->nonNegativeInteger('SER')
            ->requirePresence('SER', 'create')
            ->notEmpty('SER');

        $validator
            ->requirePresence('NPI', 'create')
            ->notEmpty('NPI')
            ->lengthBetween('NPI',[10, 10], 'NPI must be 10 digits');

        $validator
            ->nonNegativeInteger('badge_num')
            ->requirePresence('badge_num', 'create')
            ->notEmpty('badge_num');

        $validator
            ->scalar('provider_name')
            ->maxLength('provider_name', 50)
            ->requirePresence('provider_name', 'create')
            ->notEmpty('provider_name');

        $validator
            ->nonNegativeInteger('provider_status')
            ->requirePresence('provider_status', 'create')
            ->notEmpty('provider_status');

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
        $rules->add($rules->existsIn(['provider_type_id'], 'ProviderTypes'));

        return $rules;
    }

    public function beforeFind ($event, $query, $options, $primary) 
    {
        $order = $query->clause('order');
        if ($order === null || !count($order)) {
            $query->order( [$this->getAlias() . '.provider_name' => 'ASC'] );
        }
    }
}
