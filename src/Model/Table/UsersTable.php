<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\HasMany $Deposits
 * @property \Cake\ORM\Association\BelongsToMany $Deposits
 */
class UsersTable extends Table
{
	// set display mode
	

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

   
        $this->displayField('username');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
		
		$this->hasMany('Loans', [
			'foreignKey' => 'lendee_id',
			'joinType' => 'inner',
			'propertyName' => 'user',
			'bindingLey' => 'username'
			]);
			
		$this->hasMany('Collaterial', [
			'foreignKey' => 'user_id',
			'joinType' => 'INNER',
			]);	


        $this->hasMany('Deposits', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsToMany('Deposits', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'deposit_id',
            'joinTable' => 'users_deposits'
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
            ->add('email', 'valid', ['rule' => 'email'])
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

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
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }
	public function findLoans(Query $query, array $options) {
		// find the loans this user has made or given
		return $this->find()->distinct(['Users.id'])->matching('loans', function($q) use ($options) {
		    return $q->where(['Users.email IN' => $options['loans']]);
		});
	}
}
