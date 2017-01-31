<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Podkategorie Model
 *
 * @method \App\Model\Entity\Podkategorie get($primaryKey, $options = [])
 * @method \App\Model\Entity\Podkategorie newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Podkategorie[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Podkategorie|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Podkategorie patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Podkategorie[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Podkategorie findOrCreate($search, callable $callback = null)
 */
class PodkategorieTable extends Table
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

        $this->table('podkategorie');
        $this->displayField('id_podkateg');
        $this->primaryKey('id_podkateg');
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
            ->integer('id_podkateg')
            ->allowEmpty('id_podkateg', 'create');

        $validator
            ->requirePresence('nazwa_podkateg', 'create')
            ->notEmpty('nazwa_podkateg');

        $validator
            ->integer('id_kateg')
            ->requirePresence('id_kateg', 'create')
            ->notEmpty('id_kateg');

        return $validator;
    }
}
