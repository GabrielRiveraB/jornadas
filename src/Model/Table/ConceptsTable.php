<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Concepts Model
 *
 * @property \App\Model\Table\RequestsTable&\Cake\ORM\Association\HasMany $Requests
 *
 * @method \App\Model\Entity\Concept get($primaryKey, $options = [])
 * @method \App\Model\Entity\Concept newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Concept[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Concept|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Concept saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Concept patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Concept[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Concept findOrCreate($search, callable $callback = null, $options = [])
 */
class ConceptsTable extends Table
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

        $this->setTable('concepts');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Requests', [
            'foreignKey' => 'concept_id',
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
            ->maxLength('name', 30)
            ->allowEmptyString('name');

        return $validator;
    }
}
