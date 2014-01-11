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

    public function alterarSaldo($cliente_id, $valor = 0, $tipo, $dados = null) {
        if ((!empty($cliente_id)) && (!empty($tipo))) {
            $this->id = $cliente_id;
            $saldo = $this->field('saldo');
            if (!empty($saldo)) {
                $novo_saldo = ($saldo) + ($valor);
                if ($this->saveField('saldo', $novo_saldo)) {
                    $log = array(
                        'cliente_id' => $cliente_id,
                        'tipo' => $tipo,
                        'valor' => $valor,
                        'saldo' => $saldo,
                        'novo_saldo' => $novo_saldo
                    );
                    return ClassRegistry::init('SaldoLog')->saveLog($log);
                }
            }
        }
        return false;
    }
    
}
