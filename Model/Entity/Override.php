<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Override Entity
 *
 * @property int $id
 * @property int $override_type
 * @property int|null $specific_metric_id
 * @property int|null $provider_id
 * @property int $time_frame
 * @property int|null $target_quarter
 * @property int|null $target_year
 *
 * @property \App\Model\Entity\SpecificMetric $specific_metric
 * @property \App\Model\Entity\Provider $provider
 */
class Override extends Entity
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
    public function getTimeFrames()
    {
        return array(0 => 'Year', 1 => 'Quarter');
    }

    public function getOverrideTypes()
    {
        return array(0 => 'Specific Metric', 1 => 'Provider');
    }
    
    protected $_accessible = [
        'override_type' => true,
        'specific_metric_id' => true,
        'provider_id' => true,
        'time_frame' => true,
        'target_quarter' => true,
        'target_year' => true,
        'specific_metric' => true,
        'provider' => true
    ];
}
