<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UzytkProd Model
 *
 * @method \App\Model\Entity\UzytkProd get($primaryKey, $options = [])
 * @method \App\Model\Entity\UzytkProd newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UzytkProd[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UzytkProd|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UzytkProd patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UzytkProd[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UzytkProd findOrCreate($search, callable $callback = null)
 */
class UzytkProdTable extends Table
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

        $this->table('uzytk_prod');
        $this->displayField('id_uzytk_prod');
        $this->primaryKey('id_uzytk_prod');
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
            ->integer('id_uzytk_prod')
            ->allowEmpty('id_uzytk_prod', 'create');

        $validator
            ->integer('id_uzytk')
            ->requirePresence('id_uzytk', 'create')
            ->notEmpty('id_uzytk');

        $validator
            ->integer('id_prod')
            ->requirePresence('id_prod', 'create')
            ->notEmpty('id_prod');

        $validator
            ->integer('posilek')
            ->requirePresence('posilek', 'create')
            ->notEmpty('posilek');

        return $validator;
    }
}
