<?php
namespace App\Model\Table;

use App\Model\Entity\Loan;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Loans Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Lendees
 * @property \Cake\ORM\Association\BelongsTo $Collaterials
 * @property \Cake\ORM\Association\HasMany $Collaterial
 * @property \Cake\ORM\Association\BelongsToMany $Collaterial
 */
class LoansTable extends Table
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

        $this->table('loans');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'lender_id',
            'joinType' => 'INNER'
        ]);
        $this->hasOne('Lendees', [
            'foreignKey' => 'lendee_id',
            'joinType' => 'INNER'
        ]);
        $this->hasOne('Collaterial', [
            'foreignKey' => 'id',
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
            ->add('amount', 'valid', ['rule' => 'numeric'])
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

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
        $rules->add($rules->existsIn(['lender_id'], 'Users'));
        $rules->add($rules->existsIn(['lendee_id'], 'Users'));
        $rules->add($rules->existsIn(['collaterial_id'], 'Collaterial'));
        return $rules;
    }
}
