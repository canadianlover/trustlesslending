<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Deposit Entity.
 *
 * @property int $id
 * @property int $user_id
 * @property float $amount
 * @property \Cake\I18n\Time $date
 * @property \Cake\I18n\Time $repay_date
 * @property \App\Model\Entity\User[] $users
 */
class Deposit extends Entity
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
