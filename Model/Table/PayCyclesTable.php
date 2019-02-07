<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PayCycles Model
 *
 * @property \App\Model\Table\ContractsTable|\Cake\ORM\Association\HasMany $Contracts
 *
 * @method \App\Model\Entity\PayCycle get($primaryKey, $options = [])
 * @method \App\Model\Entity\PayCycle newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PayCycle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PayCycle|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PayCycle|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PayCycle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PayCycle[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PayCycle findOrCreate($search, callable $callback = null, $options = [])
 */
class PayCyclesTable extends Table
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

        $this->setTable('pay_cycles');
        $this->setDisplayField('pay_cycle');
        $this->setPrimaryKey('id');

        $this->hasMany('Contracts', [
            'foreignKey' => 'pay_cycle_id'
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
            ->scalar('pay_cycle')
            ->maxLength('pay_cycle', 50)
            ->requirePresence('pay_cycle', 'create')
            ->notEmpty('pay_cycle');

        return $validator;
    }
}
