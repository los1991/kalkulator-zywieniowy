<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProduktParam Model
 *
 * @method \App\Model\Entity\ProduktParam get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProduktParam newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProduktParam[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProduktParam|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProduktParam patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProduktParam[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProduktParam findOrCreate($search, callable $callback = null)
 */
class ProduktParamTable extends Table
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

        $this->table('produkt_param');
        $this->displayField('id_prod_param');
        $this->primaryKey('id_prod_param');
        
        $this->belongsTo('Parametry');
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
            ->integer('id_prod_param')
            ->allowEmpty('id_prod_param', 'create');

        $validator
            ->integer('id_prod')
            ->requirePresence('id_prod', 'create')
            ->notEmpty('id_prod');

        $validator
            ->integer('id_param')
            ->requirePresence('id_param', 'create')
            ->notEmpty('id_param');

        return $validator;
    }
}
