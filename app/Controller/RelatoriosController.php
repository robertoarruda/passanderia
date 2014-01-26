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
        
        if(!empty($this->request->data['Filtro'])) {
            $this->Session->write('relatorio_servicos', $this->request->data['Filtro']);
        }
        $filtro = $this->Session->read('relatorio_servicos');
        
        $options = array('conditions' => array());
        if (!isset($filtro)) {
            $filtro = array(
                'de' => '',
                'ate' => '',
                'status' => ''
            );
        }
        
        if (empty($filtro['de'])) {
            $de = date('Y-m-\0\1');
            $filtro['de'] = date('\0\1/m/Y');
        } else {
            $de = implode('-', array_reverse(explode('/', $filtro['de'])));
        }
        if (empty($filtro['ate'])) {
            $ate = date('Y-m-') . date("t", mktime(0,0,0,date('m'),'01',date('Y')));
            $filtro['ate'] = date("t", mktime(0,0,0,date('m'),'01',date('Y'))) . date('/m/Y');
        } else {
            $ate = implode('-', array_reverse(explode('/', $filtro['ate'])));
        }
        if (!empty($de) && !empty($ate)) {
            $options['conditions'] = array_merge($options['conditions'], array(
                'Servico.data_fechamento >=' => $de,
                'Servico.data_fechamento <=' => $ate
            ));
        }
        switch ($filtro['status']) {
            case 'all':
                break;
            case 'aberto':
                $options['conditions'] = array_merge($options['conditions'], array(
                    'Servico.data_fechamento' => ''
                ));
                break;
            case 'fechado':
                $options['conditions'] = array_merge($options['conditions'], array(
                    'Servico.data_fechamento <>' => '',
                    'Pagamento.valor' => ''
                ));
                break;
            case 'pago':
                $options['conditions'] = array_merge($options['conditions'], array(
                    'Pagamento.valor <>' => ''
                ));
                break;
        }
        $options['order'] = array('Servico.data_fechamento', 'Servico.data_abertura');
        $this->request->data['Filtro'] = $filtro;
        $this->set('servicos', $this->Servico->find('all', $options));
    }

    public function servicos_por_cliente() {
        $this->loadModel('Servico');
        
        $this->Servico->virtualFields = array(
            'servico_count' => 'COUNT(Servico.id)',
            'servico_sum' => 'SUM(Servico.valor)'
        );
        
        if(!empty($this->request->data['Filtro'])) {
            $this->Session->write('relatorio_servicos_por_cliente', $this->request->data['Filtro']);
        }
        $filtro = $this->Session->read('relatorio_servicos_por_cliente');
        
        $options = array('conditions' => array());
        if (!isset($filtro)) {
            $filtro = array(
                'de' => '',
                'ate' => '',
                'status' => ''
            );
        }
        
        if (empty($filtro['de'])) {
            $de = date('Y-m-\0\1');
            $filtro['de'] = date('\0\1/m/Y');
        } else {
            $de = implode('-', array_reverse(explode('/', $filtro['de'])));
        }
        if (empty($filtro['ate'])) {
            $ate = date('Y-m-') . date("t", mktime(0,0,0,date('m'),'01',date('Y')));
            $filtro['ate'] = date("t", mktime(0,0,0,date('m'),'01',date('Y'))) . date('/m/Y');
        } else {
            $ate = implode('-', array_reverse(explode('/', $filtro['ate'])));
        }
        if (!empty($de) && !empty($ate)) {
            $options['conditions'] = array_merge($options['conditions'], array(
                'Servico.data_fechamento >=' => $de,
                'Servico.data_fechamento <=' => $ate
            ));
        }
        switch ($filtro['status']) {
            case 'all':
                break;
            case 'aberto':
                $options['conditions'] = array_merge($options['conditions'], array(
                    'Servico.data_fechamento' => ''
                ));
                break;
            case 'fechado':
                $options['conditions'] = array_merge($options['conditions'], array(
                    'Servico.data_fechamento <>' => '',
                    'Pagamento.valor' => ''
                ));
                break;
            case 'pago':
                $options['conditions'] = array_merge($options['conditions'], array(
                    'Pagamento.valor <>' => ''
                ));
                break;
        }
        $options['order'] = array('Servico.servico_count DESC', 'Cliente.nome');
        $options['group'] = array('Servico.cliente_id');
        $this->request->data['Filtro'] = $filtro;
        $this->set('servicos', $this->Servico->find('all', $options));
    }

}