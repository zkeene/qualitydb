<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProviderTypes Model
 *
 * @property \App\Model\Table\ProvidersTable|\Cake\ORM\Association\HasMany $Providers
 *
 * @method \App\Model\Entity\ProviderType get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProviderType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProviderType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProviderType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProviderType|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProviderType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProviderType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProviderType findOrCreate($search, callable $callback = null, $options = [])
 */
class ProviderTypesTable extends Table
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

        $this->setTable('provider_types');
        $this->setDisplayField('provider_type');
        $this->setPrimaryKey('id');

        $this->hasMany('Providers', [
            'foreignKey' => 'provider_type_id'
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
            ->scalar('provider_type')
            ->maxLength('provider_type', 50)
            ->requirePresence('provider_type', 'create')
            ->notEmpty('provider_type');

        return $validator;
    }
}
