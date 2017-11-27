<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Hall Entity
 *
 * @property int $id
 * @property int $cinema_id
 * @property string $name
 * @property int $rows
 * @property int $seats
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Cinema $cinema
 * @property \App\Model\Entity\Booking[] $bookings
 * @property \App\Model\Entity\Movie[] $movies
 */
class Hall extends Entity
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
        'cinema_id' => true,
        'name' => true,
        'rows' => true,
        'seats' => true,
        'created' => true,
        'modified' => true,
        'cinema' => true,
        'bookings' => true,
        'movies' => true
    ];
}
