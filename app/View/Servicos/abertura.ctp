<h1>Abertura de Serviço</h1>
<hr>
<div class="form">
    <?php
    echo $this->Form->create('Servico');
    echo $this->Form->input('cliente_id', array(
        'class' => 'customSelect',
        'data-placeholder' => 'Selecione...',
        'empty' => '',
        'type' => 'select',
        'options' => $clientes
    ));
    echo $this->Form->input('data_abertura', array(
        'label' => 'Data de Abertura',
        'type' => 'text',
        'class' => 'datepicker'
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