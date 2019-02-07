<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Messages Model
 *
 * @property \App\Model\Table\SpecificMetricThresholdsTable|\Cake\ORM\Association\HasMany $SpecificMetricThresholds
 *
 * @method \App\Model\Entity\Message get($primaryKey, $options = [])
 * @method \App\Model\Entity\Message newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Message[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Message|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Message|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Message patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Message[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Message findOrCreate($search, callable $callback = null, $options = [])
 */
class MessagesTable extends Table
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

        $this->setTable('messages');
        $this->setDisplayField('message_title');
        $this->setPrimaryKey('id');

        $this->hasMany('SpecificMetricThresholds', [
            'foreignKey' => 'message_id'
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
            ->scalar('message')
            ->maxLength('message', 16777215)
            ->requirePresence('message', 'create')
            ->notEmpty('message');

        $validator
            ->scalar('message_title')
            ->maxLength('message_title', 50)
            ->requirePresence('message_title', 'create')
            ->notEmpty('message_title');

        return $validator;
    }
}
