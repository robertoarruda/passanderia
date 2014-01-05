<h1>Lançar Pagamento</h1>
<hr>
<div class="form">
    <?php
    echo $this->Form->create('Pagamento', array('action' => 'lancar '));
    ?>
    <fieldset>
        <?php
        echo $this->Form->input('Cliente.id');
        echo $this->Form->input('Cliente.nome', array(
            'label' => 'Nome do Cliente',
            'type' => 'text',
            'readonly' => 'readonly'
        ));
        echo $this->Form->input('Servico.data_abertura', array(
            'label' => 'Data de Abertura',
            'type' => 'text',
            'readonly' => 'readonly'
        ));
        echo $this->Form->input('Servico.data_fechamento', array(
            'label' => 'Data de Fechamento',
            'type' => 'text',
            'readonly' => 'readonly'
        ));
        echo $this->Form->input('Servico.valor', array(
            'label' => 'Valor do Serviço (R$)',
            'type' => 'text',
            'readonly' => 'readonly'
        ));
        ?>
    </fieldset>
    <?php
    echo $this->Form->input('Servico.id');
    echo $this->Form->input('Pagamento.valor', array(
        'label' => 'Valor Pago (R$)',
        'required' => 'required',
        'placeholder' => '0,00',
        'min' => '0'
    ));
    echo $this->Form->input('Pagamento.comentarios', array(
        'label' => 'Comentários'
    ));
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