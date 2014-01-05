<?php
$this->Html->script('jquery.min', array('inline' => false));
$this->Html->script('jquery.maskedinput.min', array('inline' => false));
$this->Html->script('masks', array('inline' => false));
?>
<h1>Alterar Saldo do Cliente</h1>
<hr>
<div class="form">
    <?php
    echo $this->Form->create('Cliente', array('action' => 'alterar_saldo'));
    ?>
    <fieldset>
    <?php
    echo $this->Form->input('nome', array('readonly' => 'readonly'));
    echo $this->Form->input('saldo', array(
        'label' => 'Saldo Atual (R$)',
        'type' => 'text',
        'readonly' => 'readonly'
    ));
    ?>
    </fieldset>
    <?php
    echo $this->Form->input('lancar_saldo', array(
        'label' => 'Lançar Valor ao Saldo (R$)',
        'type' => 'number',
        'placeholder' => '0,00'
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