<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Workupdates Model
 *
 * @property \App\Model\Table\WorksTable&\Cake\ORM\Association\BelongsTo $Works
 *
 * @method \App\Model\Entity\Workupdate get($primaryKey, $options = [])
 * @method \App\Model\Entity\Workupdate newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Workupdate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Workupdate|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Workupdate saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Workupdate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Workupdate[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Workupdate findOrCreate($search, callable $callback = null, $options = [])
 */
class WorkupdatesTable extends Table
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

        $this->setTable('workupdates');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Works', [
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
            ->maxLength('name', 250)
            ->allowEmptyString('name');

        $validator
            ->scalar('type')
            ->maxLength('type', 50)
            ->allowEmptyString('type');

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
        $rules->add($rules->existsIn(['work_id'], 'Works'));

        return $rules;
    }
}
