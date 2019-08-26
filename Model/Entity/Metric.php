<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Metric Entity
 *
 * @property int $id
 * @property string $metric
 * @property string $metric_def
 * @property bool $is_calculated_metric
 * @property string $numerator_definition
 * @property string $denominator_definition
 * @property string $exclusion_definition
 *
 * @property \App\Model\Entity\Performance[] $performances
 * @property \App\Model\Entity\SpecificMetric[] $specific_metrics
 */
class Metric extends Entity
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
        'metric' => true,
        'metric_def' => true,
        'performances' => true,
        'specific_metrics' => true,
        'is_calculated_metric' => true,
        'numerator_definition' => true,
        'denominator_definition' => true,
        'exclusion_definition' => true
    ];
}
