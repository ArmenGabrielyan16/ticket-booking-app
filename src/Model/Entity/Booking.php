<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Booking Entity
 *
 * @property int $id
 * @property int $hall_id
 * @property int $movie_id
 * @property string $row_number
 * @property string $seat_number
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Hall $hall
 * @property \App\Model\Entity\Movie $movie
 */
class Booking extends Entity
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
        'hall_id' => true,
        'movie_id' => true,
        'row_number' => true,
        'seat_number' => true,
        'created' => true,
        'modified' => true,
        'hall' => true,
        'movie' => true
    ];
}
