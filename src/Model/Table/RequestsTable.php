<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Requests Model
 *
 * @property \App\Model\Table\JourneysTable&\Cake\ORM\Association\BelongsTo $Journeys
 * @property \App\Model\Table\PromotersTable&\Cake\ORM\Association\BelongsTo $Promoters
 * @property \App\Model\Table\ConceptsTable&\Cake\ORM\Association\BelongsTo $Concepts
 * @property \App\Model\Table\TypesTable&\Cake\ORM\Association\BelongsTo $Types
 * @property \App\Model\Table\PetitionersTable&\Cake\ORM\Association\BelongsTo $Petitioners
 * @property \App\Model\Table\RequeststatusesTable&\Cake\ORM\Association\BelongsTo $RequestStatuses
 * @property \App\Model\Table\RequestupdatesTable&\Cake\ORM\Association\HasMany $Requestupdates
 *
 * @method \App\Model\Entity\Request get($primaryKey, $options = [])
 * @method \App\Model\Entity\Request newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Request[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Request|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Request saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Request patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Request[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Request findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RequestsTable extends Table
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

        $this->setTable('requests');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Journeys', [
            'foreignKey' => 'journey_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Promoters', [
            'foreignKey' => 'promoter_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Concepts', [
            'foreignKey' => 'concept_id',
        ]);
        $this->belongsTo('Types', [
            'foreignKey' => 'type_id',
        ]);
        $this->belongsTo('Petitioners', [
            'foreignKey' => 'petitioner_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('RequestStatuses', [
            'foreignKey' => 'request_status_id',
        ]);
        $this->hasMany('Requestupdates', [
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
            ->integer('folio')
            ->allowEmptyString('folio');

        $validator
            ->scalar('description')
            ->maxLength('description', 350)
            ->allowEmptyString('description');

        $validator
            ->boolean('sibso')
            ->allowEmptyString('sibso');

        $validator
            ->boolean('cespt')
            ->allowEmptyString('cespt');

        $validator
            ->boolean('educacion')
            ->allowEmptyString('educacion');

        $validator
            ->boolean('municipio')
            ->allowEmptyString('municipio');

        $validator
            ->boolean('dif')
            ->allowEmptyString('dif');

        $validator
            ->boolean('juventud')
            ->allowEmptyString('juventud');

        $validator
            ->scalar('other')
            ->maxLength('other', 200)
            ->allowEmptyString('other');

        $validator
            ->boolean('gobernador')
            ->allowEmptyString('gobernador');

        $validator
            ->integer('priority')
            ->allowEmptyString('priority');

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
        $rules->add($rules->existsIn(['promoter_id'], 'Promoters'));
        $rules->add($rules->existsIn(['concept_id'], 'Concepts'));
        $rules->add($rules->existsIn(['type_id'], 'Types'));
        $rules->add($rules->existsIn(['petitioner_id'], 'Petitioners'));
        $rules->add($rules->existsIn(['request_status_id'], 'RequestStatuses'));

        return $rules;
    }
}
