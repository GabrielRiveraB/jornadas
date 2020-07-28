<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Requestupdates Model
 *
 * @property \App\Model\Table\RequestsTable&\Cake\ORM\Association\BelongsTo $Requests
 *
 * @method \App\Model\Entity\Requestupdate get($primaryKey, $options = [])
 * @method \App\Model\Entity\Requestupdate newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Requestupdate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Requestupdate|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Requestupdate saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Requestupdate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Requestupdate[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Requestupdate findOrCreate($search, callable $callback = null, $options = [])
 */
class RequestupdatesTable extends Table
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

        $this->setTable('requestupdates');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Requests', [
            'foreignKey' => 'request_id',
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
            ->scalar('description')
            ->maxLength('description', 250)
            ->allowEmptyString('description');
          


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
        $rules->add($rules->existsIn(['request_id'], 'Requests'));

        return $rules;
    }
}
