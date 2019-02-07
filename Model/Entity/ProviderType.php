<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProviderType Entity
 *
 * @property int $id
 * @property string $provider_type
 *
 * @property \App\Model\Entity\Provider[] $providers
 */
class ProviderType extends Entity
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
        'provider_type' => true,
        'providers' => true
    ];
}
