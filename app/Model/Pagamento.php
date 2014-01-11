<?php

class Pagamento extends AppModel {

    public $name = 'Pagamento';
    public $belongsTo = array(
        'Servico' => array(
            'className' => 'Servico',
            'foreignKey' => 'servico_id'
        )
    );
}