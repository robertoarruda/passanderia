<?php

class ClientesController extends AppController {

    public $name = 'Clientes';
    public $helpers = array('Time', 'ColorNumber', 'SortLocastyle');
    public $layout = 'passanderia';

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function index() {
        $this->set('clientes', $this->Cliente->find('all', array('order' => array('nome'))));
    }

    public function view($id = null) {
        $this->layout = 'ajax';
        $cliente = $this->Cliente->read(NULL, $id);
        $this->loadModel('SaldoLog');
        $cliente['Cliente']['log'] = $this->SaldoLog->returnLog($id);
        $this->set('cliente', $cliente);
    }

    public function cadastrar() {
        $View = new View($this);
        if ($this->request->is('post')) {
            if ($this->Cliente->save($this->request->data)) {
                $this->Session->setFlash($View->element('Message', array(
                    'tipo' => 'success',
                    'titulo' => 'Sucesso',
                    'mensagem' => 'Cliente cadastrado.'
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

    public function editar($id = NULL) {
        $View = new View($this);
        if ($this->request->is('post')) {
            if ($this->Cliente->save($this->request->data)) {
                $this->Session->setFlash($View->element('Message', array(
                    'tipo' => 'success',
                    'titulo' => 'Sucesso',
                    'mensagem' => 'Cliente alterado.'
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
            $this->request->data = $this->Cliente->read(NULL, $id);
        }
    }

    public function excluir($id) {
        $View = new View($this);
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Cliente->delete($id)) {
            $this->Session->setFlash($View->element('Message', array(
                'tipo' => 'success',
                'titulo' => 'Sucesso',
                'mensagem' => 'Cliente excluido.'
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
    
    public function alterar_saldo($id) {
        $View = new View($this);   
        if ($this->request->is('post')) {
        $resultado = $this->Cliente->alterarSaldo($this->request->data['Cliente']['id'], $this->request->data['Cliente']['lancar_saldo'], __METHOD__);
            if ($resultado) {
                $this->Session->setFlash($View->element('Message', array(
                    'tipo' => 'success',
                    'titulo' => 'Sucesso',
                    'mensagem' => 'Saldo do cliente alterado.'
                )));
            } else {
                $this->Session->setFlash($View->element('Message', array(
                    'tipo' => 'error',
                    'titulo' => 'Erro',
                    'mensagem' => 'Algo de errado aconteceu.'
                )));
            }
            $this->redirect(array('action' => 'index'));
        } else {
            $this->request->data = $this->Cliente->read(NULL, $id);
        }
    }

}