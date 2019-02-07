<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Provider Entity
 *
 * @property int $id
 * @property int $SER
 * @property int $NPI
 * @property int $badge_num
 * @property int $service_line_id
 * @property string $provider_name
 * @property int $provider_status
 * @property int $provider_type_id
 *
 * @property \App\Model\Entity\ServiceLine $service_line
 * @property \App\Model\Entity\ProviderType $provider_type
 * @property \App\Model\Entity\Contract[] $contracts
 * @property \App\Model\Entity\Performance[] $performances
 */
class Provider extends Entity
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
        'SER' => true,
        'NPI' => true,
        'badge_num' => true,
        'service_line_id' => true,
        'provider_name' => true,
        'provider_status' => true,
        'provider_type_id' => true,
        'service_line' => true,
        'provider_type' => true,
        'contracts' => true,
        'performances' => true
    ];
}
