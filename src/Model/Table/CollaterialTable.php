<?php
namespace App\Model\Table;

use App\Model\Entity\Collaterial;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Collaterial Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Loans
 * @property \Cake\ORM\Association\HasMany $Loans
 * @property \Cake\ORM\Association\BelongsToMany $Loans
 */
class CollaterialTable extends Table
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

        $this->table('collaterial');
        $this->displayField('collaterial');
        $this->primaryKey('id');

        $this->belongsTo('Loans', [
            'foreignKey' => 'id',
            'joinType' => 'INNER',
			
        ]);
		$this->belongsTo('Users', [
			'foreign_key' => 'id',
			'joinType' => 'INNER'
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->add('escrow', 'valid', ['rule' => 'numeric'])
            ->requirePresence('escrow', 'create')
            ->notEmpty('escrow');

        $validator
            ->requirePresence('details', 'create')
            ->notEmpty('details');

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
        $rules->add($rules->existsIn(['loan_id'], 'Loans'));
        return $rules;
    }
	public function isOwnedBy($collaterialId, $UserId) {
		return $this->exists(['id' => $collaterialId, 'user_id' => $userId]);
	}
}
