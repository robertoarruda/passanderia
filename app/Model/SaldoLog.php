<?php

class SaldoLog extends AppModel {

    public $name = 'SaldoLog';
    
    public $validate = array(
        'tipo' => array(
            'rule' => 'notEmpty'
        ),
        'log' => array(
            'rule' => 'notEmpty'
        )
    );
    
    public function saveLog($log = null) {
        if (!empty($log)) {
            $tipo = str_replace('Controller', '', $log['tipo']);
            $msg_log = "<div class=\"list-log\">" . date('d/m/Y H:i:s');
            $msg_log .= "<br>Saldo alterado: [{$tipo}]<ul>";
            if (!empty($dados)) {
                foreach ($log['dados'] as $key => $value) {
                    $msg_log .= "<li>$key: $value</li>";
                }
            }
            $msg_log .= "<li>Saldo atual ({$log['saldo']})</li>";
            $msg_log .= "<li>Valor a contabilizar ({$log['valor']})";
            $msg_log .= "<li>Novo saldo ({$log['novo_saldo']})</li></ul></div>";
            $log_save = array(
                'tipo' => $log['tipo'],
                'log' => $msg_log,
                'cliente_id' => $log['cliente_id']
            );
            return $this->save($log_save);
        }
        return false;
    }
    
    public function returnLog($cliente_id) {
        return $this->find('all', array(
            'conditions' => array('cliente_id' => $cliente_id),
            'order' => array('created')
        ));
    }
    
}
