<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Journeys Model
 *
 * @property \App\Model\Table\RequestsTable&\Cake\ORM\Association\HasMany $Requests
 *
 * @method \App\Model\Entity\Journey get($primaryKey, $options = [])
 * @method \App\Model\Entity\Journey newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Journey[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Journey|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Journey saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Journey patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Journey[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Journey findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class JourneysTable extends Table
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

        $this->setTable('journeys');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Requests', [
            'foreignKey' => 'journey_id',
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('municipio')
            ->maxLength('municipio', 20)
            ->allowEmptyString('municipio');

        $validator
            ->dateTime('date')
            ->allowEmptyDateTime('date');

        $validator
            ->time('from')
            ->allowEmptyTime('from');

        $validator
            ->time('to')
            ->allowEmptyTime('to');

        $validator
            ->scalar('map')
            ->maxLength('map', 250)
            ->allowEmptyString('map');

        return $validator;
    }
}
