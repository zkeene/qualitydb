<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SpecificMetricThreshold Entity
 *
 * @property int $id
 * @property int $specific_metric_id
 * @property float $threshold
 * @property float $threshold_incentive_percent
 * @property int $message_id
 * @property int $threshold_color_id
 * @property bool $is_gateway_threshold
 * @property int $quarter
 *
 * @property \App\Model\Entity\SpecificMetric $specific_metric
 * @property \App\Model\Entity\Message $message
 * @property \App\Model\Entity\ThresholdColor $threshold_color
 */
class SpecificMetricThreshold extends Entity
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
        'specific_metric_id' => true,
        'threshold' => true,
        'threshold_incentive_percent' => true,
        'message_id' => true,
        'threshold_color_id' => true,
        'is_gateway_threshold' => true,
        'specific_metric' => true,
        'message' => true,
        'threshold_color' => true,
        'quarter' => true
    ];
}
