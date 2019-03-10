<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SpecificMetric Entity
 *
 * @property int $id
 * @property int $service_line_id
 * @property int $metric_id
 * @property bool $threshold_direction
 * @property bool $is_gateway_metric
 * @property string $year
 * @property bool $is_beta_metric
 * @property bool $is_service_line_metric
 *
 * @property \App\Model\Entity\ServiceLine $service_line
 * @property \App\Model\Entity\Metric $metric
 * @property \App\Model\Entity\SpecificMetricThreshold[] $specific_metric_thresholds
 */
class SpecificMetric extends Entity
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
        'service_line_id' => true,
        'metric_id' => true,
        'threshold_direction' => true,
        'is_gateway_metric' => true,
        'year' => true,
        'is_beta_metric' => true,
        'is_service_line_metric' => true,
        'service_line' => true,
        'metric' => true,
        'specific_metric_thresholds' => true
    ];
}
