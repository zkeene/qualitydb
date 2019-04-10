<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Performance Entity
 *
 * @property int $id
 * @property int|null $provider_id
 * @property int|null $location_id
 * @property int $metric_id
 * @property int $numerator
 * @property int|null $denominator
 * @property int $quarter
 * @property string $year
 * @property int|null $import_error
 *
 * @property \App\Model\Entity\Provider $provider
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\Metric $metric
 */
class Performance extends Entity
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
        'location_id' => true,
        'metric_id' => true,
        'numerator' => true,
        'denominator' => true,
        'quarter' => true,
        'year' => true,
        'import_error' => true,
        'provider' => true,
        'location' => true,
        'metric' => true
    ];
}
