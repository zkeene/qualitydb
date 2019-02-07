<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ThresholdColors Model
 *
 * @property \App\Model\Table\SpecificMetricThresholdsTable|\Cake\ORM\Association\HasMany $SpecificMetricThresholds
 *
 * @method \App\Model\Entity\ThresholdColor get($primaryKey, $options = [])
 * @method \App\Model\Entity\ThresholdColor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ThresholdColor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ThresholdColor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ThresholdColor|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ThresholdColor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ThresholdColor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ThresholdColor findOrCreate($search, callable $callback = null, $options = [])
 */
class ThresholdColorsTable extends Table
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

        $this->setTable('threshold_colors');
        $this->setDisplayField('color');
        $this->setPrimaryKey('id');

        $this->hasMany('SpecificMetricThresholds', [
            'foreignKey' => 'threshold_color_id'
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
            ->scalar('color')
            ->maxLength('color', 50)
            ->requirePresence('color', 'create')
            ->notEmpty('color');

        $validator
            ->scalar('color_hex')
            ->maxLength('color_hex', 50)
            ->requirePresence('color_hex', 'create')
            ->notEmpty('color_hex');

        return $validator;
    }
}
