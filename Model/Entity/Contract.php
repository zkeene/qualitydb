<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contract Entity
 *
 * @property int $id
 * @property int $provider_id
 * @property float|null $total_incentive_amount
 * @property int $pay_cycle_id
 * @property float|null $fte
 * @property \Cake\I18n\FrozenDate|null $effective_date
 * @property \Cake\I18n\FrozenDate|null $effective_quality_date
 * @property \Cake\I18n\FrozenDate|null $amendment_date
 * @property \Cake\I18n\FrozenDate|null $default_expire_date
 * @property \Cake\I18n\FrozenDate|null $inactive_date
 * @property bool $active
 * @property \Cake\I18n\FrozenTime $datetime_stamp
 * @property int $user_id
 *
 * @property \App\Model\Entity\Provider $provider
 * @property \App\Model\Entity\PayCycle $pay_cycle
 * @property \App\Model\Entity\User $user
 */
class Contract extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'provider_id' => true,
        'total_incentive_amount' => true,
        'pay_cycle_id' => true,
        'fte' => true,
        'effective_date' => true,
        'effective_quality_date' => true,
        'amendment_date' => true,
        'default_expire_date' => true,
        'inactive_date' => true,
        'active' => true,
        'datetime_stamp' => true,
        'user_id' => true,
        'provider' => true,
        'pay_cycle' => true,
        'user' => true
    ];
}
