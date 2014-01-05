<h1>Editar de Serviço</h1>
<hr>
<?=
$this->element('Message', array(
            'tipo' => 'info',
            'titulo' => 'Info',
            'mensagem' => 'Alterando os campos Valor de Serviço e Valor Pago por esta tela, não resultará em mudanças nos dados de saldo do cliente.<br>Para fechar um serviço utilize a opção Fechar Serviço.'
));
?>
<div class="form">
    <?php
    echo $this->Form->create('Servico', array('action' => 'editar',
        'class' => 'fLeft widthfull',
    ));
    echo $this->Form->input('cliente_id', array(
        'type' => 'select',
        'options' => $clientes,
        'class' => 'customSelect',
        'data-placeholder' => 'Selecione...'
    ));
    echo $this->Form->input('data_abertura', array(
        'label' => 'Data de Abertura',
        'type' => 'text',
        'required' => 'required',
        'class' => 'datepicker date-mask'
    ));
    echo $this->Form->input('data_fechamento', array(
        'label' => 'Data de Fechamento',
        'type' => 'text',
        'class' => 'datepicker date-mask'
    ));
    echo $this->Form->input('valor', array(
        'label' => 'Valor do Serviço (R$)',
        'placeholder' => '0,00',
        'min' => '0'
    ));
    echo $this->Form->input('valor_pago', array(
        'label' => 'Valor Pago (R$)',
        'placeholder' => '0,00',
        'min' => '0'
    ));
    echo $this->Form->input('comentarios', array(
        'label' => 'Comentários'
    ));
    echo $this->Form->input('id', array('type' => 'hidden'));
    ?>
</div>
<div class="row-fluid">
    <div class="boxActions">
    <?php
    echo $this->Form->end(array('label' => 'Salvar', 'class' => 'btn btn-success'));
    ?>
    </div>
</div>
<div class="row-fluid btn-voltar">
    <div class="fright span1">
        <?= $this->Html->link('Voltar', array('action' => 'index'), array('class' => 'btn btn-inverse ico-reply btn-large')); ?>
    </div>
</div>