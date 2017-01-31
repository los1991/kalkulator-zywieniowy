<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Produkt Model
 *
 * @method \App\Model\Entity\Produkt get($primaryKey, $options = [])
 * @method \App\Model\Entity\Produkt newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Produkt[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Produkt|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Produkt patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Produkt[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Produkt findOrCreate($search, callable $callback = null)
 */
class ProduktTable extends Table
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

        $this->table('produkt');
        $this->displayField('id_prod');
        $this->primaryKey('id_prod');
        
        $this->hasOne('ProduktParam', [
            'className' => 'ProduktParam',
            'conditions' => ['ProduktParam.id_prod' => 'Produkt.id_prod'],
            'dependent' => true
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
            ->integer('id_prod')
            ->allowEmpty('id_prod', 'create');

        $validator
            ->requirePresence('nazwa_prod', 'create')
            ->notEmpty('nazwa_prod');

        $validator
            ->requirePresence('opis_prod', 'create')
            ->notEmpty('opis_prod');

        $validator
            ->integer('id_podkateg')
            ->requirePresence('id_podkateg', 'create')
            ->notEmpty('id_podkateg');

        return $validator;
    }
}
