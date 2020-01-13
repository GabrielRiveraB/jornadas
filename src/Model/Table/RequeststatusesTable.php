<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Requeststatuses Model
 *
 * @method \App\Model\Entity\Requeststatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\Requeststatus newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Requeststatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Requeststatus|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Requeststatus saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Requeststatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Requeststatus[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Requeststatus findOrCreate($search, callable $callback = null, $options = [])
 */
class RequeststatusesTable extends Table
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

        $this->setTable('requeststatuses');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
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
            ->maxLength('name', 20)
            ->allowEmptyString('name');

        return $validator;
    }
}
