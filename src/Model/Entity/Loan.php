<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Loan Entity.
 *
 * @property int $id
 * @property int $lender_id
 * @property \App\Model\Entity\User $user
 * @property int $lendee_id
 * @property \App\Model\Entity\Lendee $lendee
 * @property float $amount
 * @property int $collaterial_id
 * @property \App\Model\Entity\Collaterial[] $collaterial
 */
class Loan extends Entity
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
        '*' => true,
        'id' => false,
    ];
}
