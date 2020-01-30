<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Promoters Model
 *
 * @property \App\Model\Table\RequestsTable&\Cake\ORM\Association\HasMany $Requests
 *
 * @method \App\Model\Entity\Promoter get($primaryKey, $options = [])
 * @method \App\Model\Entity\Promoter newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Promoter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Promoter|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Promoter saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Promoter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Promoter[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Promoter findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PromotersTable extends Table
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

        $this->setTable('promoters');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        // $this->hasMany('Requests', [
        //     'foreignKey' => 'promoter_id',
        // ]);
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
            ->maxLength('name', 200)
            ->allowEmptyString('name');

        $validator
            ->scalar('position')
            ->maxLength('position', 250)
            ->allowEmptyString('position');

        $validator
            ->scalar('dependency')
            ->maxLength('dependency', 250)
            ->allowEmptyString('dependency');

        $validator
            ->boolean('status')
            ->allowEmptyString('status');

        return $validator;
    }
}
