<?php

class ServicosController extends AppController {

    public $name = 'Servicos';
    public $helpers = array('Time', 'ColorNumber', 'SortLocastyle');
    public $layout = 'passanderia';

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function home() {
        $this->set('title_for_layout', 'Passanderia PassExpress');
        $this->set('servicos', $this->Servico->find('all', array(
            'conditions' => array('Servico.data_fechamento =' => ''),
            'order' => array(
                'Servico.data_fechamento',
                'Servico.data_abertura'
        ))));
        $this->set('menu', array(
            'cliente' => false,
            'servico' => true,
            'relatorio' => false
        ));
    }

    public function index() {
        if(!empty($this->request->data['Filtro'])) {
            $this->Session->write('servicos', $this->request->data['Filtro']);
        }
        $filtro = $this->Session->read('servicos');
        
        $options = array('conditions' => array());
        if (!isset($filtro)) {
            $filtro = array(
                'de' => '',
                'ate' => '',
                'status' => ''
            );
        }
        
        if (!empty($filtro['de'])) {
            $de = implode('-', array_reverse(explode('/', $filtro['de'])));
        }
        if (!empty($filtro['ate'])) {
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
        $options['order'] = array('Servico.data_fechamento', 'Pagamento.valor', 'Servico.data_abertura');
        $this->request->data['Filtro'] = $filtro;
        $this->set('servicos', $this->Servico->find('all', $options));
    }

    public function view($id = null) {
        $this->layout = 'ajax';
        $this->set('servico', $this->Servico->read(NULL, $id));
    }

    public function abertura() {
        $View = new View($this);
        if ($this->request->is('post')) {
            $this->request->data['Servico']['data_abertura'] = implode('-', array_reverse(explode('/', $this->request->data['Servico']['data_abertura'])));
            if ($this->Servico->save($this->request->data)) {
                $this->Session->setFlash($View->element('Message', array(
                    'tipo' => 'success',
                    'titulo' => 'Sucesso',
                    'mensagem' => 'Serviço aberto.'
                )));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash($View->element('Message', array(
                    'tipo' => 'error',
                    'titulo' => 'Erro',
                    'mensagem' => 'Algo de errado aconteceu.'
                )));
                $this->redirect(array('action' => 'index'));
            }
        } else {
            $clientes = $this->Servico->Cliente->find('list', array(
                'fields' => array('Cliente.nome'),
                'order' => array('Cliente.nome')
            ));
            $this->set('clientes', $clientes);
        }
    }

    public function fechamento($id = NULL) {
        $View = new View($this);
        $Time = $View->loadHelper('Time');
        if ($this->request->is('post')) {
            unset($this->request->data['Servico']['data_abertura']);
            $this->request->data['Servico']['data_fechamento'] = implode('-', array_reverse(explode('/', $this->request->data['Servico']['data_fechamento'])));
            if ($this->Servico->save($this->request->data)) {
                $this->loadModel('Cliente');
                $dados_log = array('servico_id' => $this->request->data['Servico']['id']);
                $resultado = $this->Cliente->alterarSaldo($this->request->data['Cliente']['id'], - $this->request->data['Servico']['valor'], __METHOD__, $dados_log);
                if ($resultado) {
                    $this->Session->setFlash($View->element('Message', array(
                        'tipo' => 'success',
                        'titulo' => 'Sucesso',
                        'mensagem' => 'Serviço fechado. <a href="pagamentos/lancar/' . $this->request->data['Servico']['id'] . '"><input type="button" value="Deseja lançar pagamento deste serviço?" class="btn btn-success"></a>'
                    )));
                } else {
                    $this->Session->setFlash($View->element('Message', array(
                        'tipo' => 'error',
                        'titulo' => 'Erro',
                        'mensagem' => 'Ocorreu um erro ao tentar alterar o saldo do cliente.<br>Favor, alterar manualmente no cadastro de clientes.'
                    )));
                }
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash($View->element('Message', array(
                    'tipo' => 'error',
                    'titulo' => 'Erro',
                    'mensagem' => 'Algo de errado aconteceu.'
                )));
                $this->redirect(array('action' => 'index'));
            }
        } else {
            $this->request->data = $this->Servico->read(NULL, $id);
            $this->request->data['Servico']['data_abertura'] = $Time->format('d/m/Y', $this->request->data['Servico']['data_abertura']);
        }
    }

    public function editar($id = NULL) {
        $View = new View($this);
        $Time = $View->loadHelper('Time');
        if ($this->request->is('post')) {
            $this->request->data['Servico']['data_abertura'] = implode('-', array_reverse(explode('/', $this->request->data['Servico']['data_abertura'])));
            if ($this->Servico->save($this->request->data)) {
                $View = new View();
                $this->Session->setFlash($View->element('Message', array(
                    'tipo' => 'success',
                    'titulo' => 'Sucesso',
                    'mensagem' => 'Serviço alterado.'
                )));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash($View->element('Message', array(
                    'tipo' => 'error',
                    'titulo' => 'Erro',
                    'mensagem' => 'Algo de errado aconteceu.'
                )));
                $this->redirect(array('action' => 'index'));
            }
        } else {
            $this->request->data = $this->Servico->read(NULL, $id);
            $this->request->data['Servico']['data_abertura'] = $Time->format('d/m/Y', $this->request->data['Servico']['data_abertura']);
            $clientes = $this->Servico->Cliente->find('list', array(
                'fields' => array('Cliente.nome'),
                'order' => array('Cliente.nome')
            ));
            $this->set('clientes', $clientes);
        }
    }

    public function excluir($id) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Servico->delete($id)) {
            $View = new View();
            $this->Session->setFlash($View->element('Message', array(
                'tipo' => 'success',
                'titulo' => 'Sucesso',
                'mensagem' => 'Serviço excluido.'
            )));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash($View->element('Message', array(
                'tipo' => 'error',
                'titulo' => 'Erro',
                'mensagem' => 'Algo de errado aconteceu.'
            )));
            $this->redirect(array('action' => 'index'));
        }
    }

}