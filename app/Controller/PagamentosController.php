<?php

class PagamentosController extends AppController {

    public $name = 'Pagamentos';
    public $helpers = array('Time', 'ColorNumber', 'SortLocastyle');
    public $layout = 'passanderia';

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function index() {
        $this->set('servicos', $this->Pagamento->find('all', array(
            'order' => array(
                'Pagamento.created',
                'Pagamento.servico_id'
        ))));
    }

    public function view($id = null) {
        $this->layout = 'ajax';
        $this->set('pagamento', $this->Pagamento->read(NULL, $id));
    }

    public function lancar($id = NULL) {
        $View = new View($this);
        $Time = $View->loadHelper('Time');
        $Number = $View->loadHelper('Number');
        $Number->addFormat(
            'BRR',
            array(
                'before' => '',
                'places' => 2,
                'zero' => '',
                'thousands' => '.',
                'decimals' => ','
            )
        );
        $Number->defaultCurrency('BRR');
        if ($this->request->is('post')) {
            $this->request->data['Pagamento']['servico_id'] = $this->request->data['Servico']['id'];
            if ($this->Pagamento->save($this->request->data)) {
                $this->loadModel('Cliente');
                $this->Cliente->id = $this->request->data['Cliente']['id'];
                $saldo = $this->Cliente->field('saldo');
                $this->Cliente->saveField('saldo', ($saldo) + ($this->request->data['Pagamento']['valor']));
                $this->Session->setFlash($View->element('Message', array(
                    'tipo' => 'success',
                    'titulo' => 'Sucesso',
                    'mensagem' => 'Pagamento lançado.'
                )));
                $this->redirect(array(
                    'controller' => 'servicos',
                    'action' => 'index'
                ));
            } else {
                $this->Session->setFlash($View->element('Message', array(
                    'tipo' => 'error',
                    'titulo' => 'Erro',
                    'mensagem' => 'Algo de errado aconteceu.'
                )));
                $this->redirect(array('action' => 'index'));
            }
        } else {
            $this->loadModel('Servico');
            $this->request->data = $this->Servico->read(NULL, $id);
            $this->request->data['Servico']['data_abertura'] = $Time->format('d/m/Y', $this->request->data['Servico']['data_abertura']);
            $this->request->data['Servico']['data_fechamento'] = $Time->format('d/m/Y', $this->request->data['Servico']['data_fechamento']);
            $this->request->data['Servico']['valor'] = $Number->currency($this->request->data['Servico']['valor']);
        }
    }

    public function excluir($id) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Pagamento->delete($id)) {
            $View = new View();
            $this->Session->setFlash($View->element('Message', array(
                'tipo' => 'success',
                'titulo' => 'Sucesso',
                'mensagem' => 'Pagamento excluido.'
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