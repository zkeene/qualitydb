<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ServiceLines Model
 *
 * @property \App\Model\Table\ProvidersTable|\Cake\ORM\Association\HasMany $Providers
 * @property \App\Model\Table\SpecificMetricsTable|\Cake\ORM\Association\HasMany $SpecificMetrics
 *
 * @method \App\Model\Entity\ServiceLine get($primaryKey, $options = [])
 * @method \App\Model\Entity\ServiceLine newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ServiceLine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ServiceLine|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ServiceLine|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ServiceLine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ServiceLine[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ServiceLine findOrCreate($search, callable $callback = null, $options = [])
 */
class ServiceLinesTable extends Table
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

        $this->setTable('service_lines');
        $this->setDisplayField('service_line');
        $this->setPrimaryKey('id');

        $this->hasMany('Providers', [
            'foreignKey' => 'service_line_id'
        ]);
        $this->hasMany('SpecificMetrics', [
            'foreignKey' => 'service_line_id'
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
            ->scalar('service_line')
            ->maxLength('service_line', 50)
            ->requirePresence('service_line', 'create')
            ->notEmpty('service_line');

        return $validator;
    }
}
