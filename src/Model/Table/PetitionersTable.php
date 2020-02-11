<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Petitioners Model
 *
 * @property \App\Model\Table\RequestsTable&\Cake\ORM\Association\HasMany $Requests
 *
 * @method \App\Model\Entity\Petitioner get($primaryKey, $options = [])
 * @method \App\Model\Entity\Petitioner newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Petitioner[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Petitioner|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Petitioner saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Petitioner patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Petitioner[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Petitioner findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PetitionersTable extends Table
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

        $this->setTable('petitioners');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Requests', [
            'foreignKey' => 'petitioner_id',
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
            ->maxLength('name', 250);

        $validator
            ->integer('age')
            ->allowEmptyString('age');

        $validator
            ->scalar('civilstatus')
            ->maxLength('civilstatus', 15)
            ->allowEmptyString('civilstatus');

        $validator
            ->scalar('address')
            ->maxLength('address', 350)
            ->allowEmptyString('address');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 20);

        $validator
            ->email('email')
            ->allowEmptyString('email');

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
        // $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
