<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Uzytkownik Model
 *
 * @method \App\Model\Entity\Uzytkownik get($primaryKey, $options = [])
 * @method \App\Model\Entity\Uzytkownik newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Uzytkownik[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Uzytkownik|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Uzytkownik patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Uzytkownik[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Uzytkownik findOrCreate($search, callable $callback = null)
 */
class UzytkownikTable extends Table
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

        $this->table('uzytkownik');
        $this->displayField('id_uzytk');
        $this->primaryKey('id_uzytk');
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
            ->integer('id_uzytk')
            ->allowEmpty('id_uzytk', 'create');

        $validator
            ->requirePresence('login', 'create')
            ->notEmpty('login');

        $validator
            //->requirePresence('haslo', 'create')
            ->notEmpty('haslo');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->integer('wiek');
//            ->requirePresence('wiek', 'create')

        $validator
            ->integer('wzorst');

        $validator
            ->integer('waga');

        $validator
            ->requirePresence('plec', 'create')
            ->notEmpty('plec');

        $validator
            ->integer('zap_kalorie');

        $validator
            ->integer('zap_bialko');

        $validator
            ->integer('zap_wegle');

        $validator
            ->integer('zap_tluszcz');
        
        $validator
            ->requirePresence('rola', 'create')
            ->notEmpty('rola');

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
        $rules->add($rules->isUnique(['login']));
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
