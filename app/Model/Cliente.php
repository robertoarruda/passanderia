<?php

class Cliente extends AppModel {

    public $name = 'Cliente';
//    public $hasMany = array(
//        'Servico' => array(
//            'className' => 'Servico',
//            'foreignKey' => 'cliente_id'
//        )
//    );
    public $validate = array(
        'nome' => array(
            'rule' => 'notEmpty'
        ),
        'endereco' => array(
            'rule' => 'notEmpty'
        ),
        'bairro' => array(
            'rule' => 'notEmpty'
        ),
        'telefone' => array(
            'rule' => 'notEmpty'
        ),
        'saldo' => array(
            'rule' => 'notEmpty'
        )
    );

}

?>
