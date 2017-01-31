<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Kategorie Model
 *
 * @method \App\Model\Entity\Kategorie get($primaryKey, $options = [])
 * @method \App\Model\Entity\Kategorie newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Kategorie[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Kategorie|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Kategorie patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Kategorie[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Kategorie findOrCreate($search, callable $callback = null)
 */
class KategorieTable extends Table
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

        $this->table('kategorie');
        $this->displayField('id_kateg');
        $this->primaryKey('id_kateg');
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
            ->integer('id_kateg')
            ->allowEmpty('id_kateg', 'create');

        $validator
            ->requirePresence('nazwa_kateg', 'create')
            ->notEmpty('nazwa_kateg');

        return $validator;
    }
}
