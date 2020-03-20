<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dependencies Model
 *
 * @property \App\Model\Table\ActivitiesTable&\Cake\ORM\Association\HasMany $Activities
 *
 * @method \App\Model\Entity\Dependency get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dependency newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Dependency[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dependency|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dependency saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dependency patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dependency[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dependency findOrCreate($search, callable $callback = null, $options = [])
 */
class DependenciesTable extends Table
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

        $this->setTable('dependencies');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Activities', [
            'foreignKey' => 'dependency_id',
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
            ->maxLength('name', 35)
            ->allowEmptyString('name');

        $validator
            ->scalar('longname')
            ->maxLength('longname', 250)
            ->allowEmptyString('longname');

        return $validator;
    }
}
