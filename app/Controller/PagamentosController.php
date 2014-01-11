<?php

class PagamentosController extends AppController {

    public $name = 'Pagamentos';
    public $helpers = array('Time', 'ColorNumber', 'SortLocastyle');
    public $layout = 'passanderia';

    public function beforeFilter() {
        parent::beforeFilter();
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
                $dados_log = array(
                    'servico_id' => $this->request->data['Servico']['id']
                );
                $resultado = $this->Cliente->alterarSaldo($this->request->data['Cliente']['id'], $this->request->data['Pagamento']['valor'], __METHOD__, $dados_log);
                if ($resultado) {
                    $this->Session->setFlash($View->element('Message', array(
                        'tipo' => 'success',
                        'titulo' => 'Sucesso',
                        'mensagem' => 'Pagamento lançado.'
                    )));
                } else {
                    $this->Session->setFlash($View->element('Message', array(
                        'tipo' => 'error',
                        'titulo' => 'Erro',
                        'mensagem' => 'Ocorreu um erro ao tentar alterar o saldo do cliente.<br>Favor, alterar manualmente no cadastro de clientes.'
                    )));
                }
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

}