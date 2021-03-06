<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Works Model
 *
 * @property \App\Model\Table\JourneysTable&\Cake\ORM\Association\BelongsTo $Journeys
 * @property \App\Model\Table\WorkstatusesTable&\Cake\ORM\Association\BelongsTo $WorkStatuses
 * @property &\Cake\ORM\Association\HasMany $Workupdates
 *
 * @method \App\Model\Entity\Work get($primaryKey, $options = [])
 * @method \App\Model\Entity\Work newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Work[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Work|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Work saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Work patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Work[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Work findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WorksTable extends Table
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

        $this->setTable('works');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Journeys', [
            'foreignKey' => 'journey_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('WorkStatuses', [
            'foreignKey' => 'workStatus_id',
        ]);
        $this->hasMany('Workupdates', [
            'foreignKey' => 'work_id',
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
            ->scalar('name')
            ->maxLength('name', 150)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->maxLength('description', 250)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->scalar('responsables')
            ->maxLength('responsables', 250)
            ->allowEmptyString('responsables');

        $validator
            ->scalar('folio')
            ->maxLength('folio', 50)
            ->requirePresence('folio', 'create')
            ->notEmptyString('folio');

        $validator
            ->date('fecha_compromiso')
            ->allowEmptyDate('fecha_compromiso');

        $validator
            ->date('start')
            ->allowEmptyDate('start');

        $validator
            ->date('end')
            ->allowEmptyDate('end');

        $validator
            ->decimal('cost')
            ->allowEmptyString('cost');

        $validator
            ->integer('completed')
            ->allowEmptyString('completed');

        $validator
            ->integer('paid')
            ->allowEmptyString('paid');

        $validator
            ->decimal('latitude')
            ->allowEmptyString('latitude');

        $validator
            ->decimal('longitude')
            ->allowEmptyString('longitude');

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
        $rules->add($rules->existsIn(['journey_id'], 'Journeys'));
        $rules->add($rules->existsIn(['workStatus_id'], 'WorkStatuses'));

        return $rules;
    }
}
