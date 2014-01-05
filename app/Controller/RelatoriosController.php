<?php

class RelatoriosController extends AppController {

    public $name = 'Relatorios';
    public $helpers = array('Time', 'ColorNumber', 'SortLocastyle');
    public $layout = 'passanderia';

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function index() {
        //pagina inicial
    }

    public function clientes_devedores() {
        $this->loadModel('Cliente');
        $this->set('clientes',
            $this->Cliente->find(
                'all',
                array(
                    'conditions' => array('Cliente.saldo <' => 0),
                    'order' => array('Cliente.saldo')
                )
            )
        );
    }

    public function clientes_credores() {
        $this->loadModel('Cliente');
        $this->set('clientes',
            $this->Cliente->find(
                'all',
                array(
                    'conditions' => array('Cliente.saldo >' => 0),
                    'order' => array('Cliente.saldo DESC')
                )
            )
        );
    }

    public function clientes_mais_rentaveis() {
        $this->loadModel('Servico');
        $this->Servico->virtualFields = array(
            'servico_rentavel' => '(SUM(Servico.valor) / COUNT(Servico.id))',
            'servico_count' => 'COUNT(Servico.id)',
            'servico_sum' => 'SUM(Servico.valor)'
        );
        $this->set('servicos',
            $this->Servico->find(
                'all',
                array(
                    'order' => array('Servico.servico_rentavel DESC', 'Cliente.nome'),
                    'group' => array('Servico.cliente_id')
                )
            )
        );
    }

    public function servicos() {
        $this->loadModel('Servico');
        $conditions = array();
        if (empty($this->request->query)) {
            $dados = array(
                'id' => '',
                'cliente' => '',
                'de' => '',
                'ate' => ''
            );
        } else {
            $dados = $this->request->query;
            if (!empty($this->request->query['id'])) {
                $conditions[] = array('Servico.id =' => $this->request->query['id']);
            }
            if (!empty($this->request->query['cliente'])) {
                $conditions[] = array('Cliente.nome LIKE' => '%' . $this->request->query['cliente'] .  '%');
            }
            $de = '';
            $ate = '';
            if ((!empty($this->request->query['de']['year']))
                && (!empty($this->request->query['de']['month']))
                && (!empty($this->request->query['de']['day']))
            ) {
                $de = $this->request->query['de']['year'] . '-' . $this->request->query['de']['month'] . '-' . $this->request->query['de']['day'];
            }
            if ((!empty($this->request->query['ate']['year']))
                && (!empty($this->request->query['ate']['month']))
                && (!empty($this->request->query['ate']['day']))
            ) {
                $ate = $this->request->query['ate']['year'] . '-' . $this->request->query['ate']['month'] . '-' . $this->request->query['ate']['day'];
            }
            if (($de) || ($ate)) {
                $de = ($de) ? $de : '0000-00-00';
                $ate = ($ate) ? $ate : '9999-12-31';
                $conditions[] = array('Servico.data_fechamento BETWEEN ? AND ?' => array($de, $ate));
            }
        }
        $this->set('dados', $dados);
        $this->set(
            'servicos',
            $this->Servico->find(
                'all',
                array(
                    'conditions' => $conditions,
                    'order' => array('Servico.data_fechamento', 'Servico.data_abertura')
                )
            )
        );
    }

    public function servicos_por_cliente() {
        $this->loadModel('Servico');
        $this->Servico->virtualFields = array(
            'servico_count' => 'COUNT(Servico.id)',
            'servico_sum' => 'SUM(Servico.valor)'
        );
        $this->set('servicos', $this->Servico->find(
                'all', array(
                    'order' => array('Servico.servico_count DESC', 'Cliente.nome'),
                    'group' => array('Servico.cliente_id')
                )
            )
        );
    }

}

?>