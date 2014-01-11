<?php

class Servico extends AppModel {

    public $name = 'Servico';
    public $hasOne = array(
        'Pagamento' => array(
            'className' => 'Pagamento',
            'foreignKey' => 'servico_id'
        )
    );
    public $belongsTo = array(
        'Cliente' => array(
            'className' => 'Cliente',
            'foreignKey' => 'cliente_id'
        )
    );
}