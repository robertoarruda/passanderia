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
        $this->set('cliente', $this->Cliente->read(NULL, $id));
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
            $this->Cliente->id = $this->request->data['Cliente']['id'];
            $saldo = $this->Cliente->field('saldo');
            if ($this->Cliente->saveField('saldo', ($saldo) + ($this->request->data['Cliente']['lancar_saldo']))) {
                $this->Session->setFlash($View->element('Message', array(
                    'tipo' => 'success',
                    'titulo' => 'Sucesso',
                    'mensagem' => 'Saldo do cliente alterado.'
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

}