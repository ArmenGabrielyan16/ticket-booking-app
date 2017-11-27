<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Halls Model
 *
 * @property \App\Model\Table\CinemasTable|\Cake\ORM\Association\BelongsTo $Cinemas
 * @property \App\Model\Table\BookingsTable|\Cake\ORM\Association\HasMany $Bookings
 * @property \App\Model\Table\MoviesTable|\Cake\ORM\Association\HasMany $Movies
 *
 * @method \App\Model\Entity\Hall get($primaryKey, $options = [])
 * @method \App\Model\Entity\Hall newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Hall[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Hall|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Hall patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Hall[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Hall findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HallsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('halls');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Cinemas', [
            'foreignKey' => 'cinema_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Bookings', [
            'foreignKey' => 'hall_id'
        ]);
        $this->hasMany('Movies', [
            'foreignKey' => 'hall_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->integer('rows')
            ->requirePresence('rows', 'create')
            ->notEmpty('rows');

        $validator
            ->integer('seats')
            ->requirePresence('seats', 'create')
            ->notEmpty('seats');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['cinema_id'], 'Cinemas'));

        return $rules;
    }

    public function getHallsByCinemaId($cinemaId)
    {
        $halls = $this->find()
            ->where(['cinema_id' => $cinemaId])
            ->all()
            ->toArray();

        return $halls;
    }
}
