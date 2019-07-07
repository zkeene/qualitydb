<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ServiceLine Entity
 *
 * @property int $id
 * @property string $service_line
 * @property bool $is_period_based
 *
 * @property \App\Model\Entity\Provider[] $providers
 * @property \App\Model\Entity\SpecificMetric[] $specific_metrics
 */
class ServiceLine extends Entity
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
        'service_line' => true,
        'providers' => true,
        'specific_metrics' => true,
        'is_period_based' => true
    ];
}
