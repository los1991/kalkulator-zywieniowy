<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Parametry Model
 *
 * @method \App\Model\Entity\Parametry get($primaryKey, $options = [])
 * @method \App\Model\Entity\Parametry newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Parametry[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Parametry|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Parametry patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Parametry[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Parametry findOrCreate($search, callable $callback = null)
 */
class ParametryTable extends Table
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

        $this->table('parametry');
        $this->displayField('id_param');
        $this->primaryKey('id_param');
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
            ->integer('id_param')
            ->allowEmpty('id_param', 'create');

        $validator
            ->requirePresence('nazwa_param', 'create')
            ->notEmpty('nazwa_param');

        
        $validator
            ->requirePresence('nazwa_jedno', 'create')
            ->notEmpty('nazwa_jedno');
        
        $validator
            ->requirePresence('skrot_jedno', 'create')
            ->notEmpty('skrot_jedno');


        return $validator;
    }
}
