<?php
$this->Html->script('jquery.min', array('inline' => false));
$this->Html->script('jquery.maskedinput.min', array('inline' => false));
$this->Html->script('masks', array('inline' => false));
?>
<h1>Cadastrar Cliente</h1>
<hr>
<div class="form">
    <?php
    echo $this->Form->create('Cliente');
    echo $this->Form->input('nome');
    echo $this->Form->input('endereco', array('label' => 'Endereço'));
    echo $this->Form->input('bairro');
    echo $this->Form->input('telefone', array(
        'type' => 'tel',
        'placeholder' => '(XX) 0000-0000',
        'mask' => '(99) 9999-9999'
    ));
    echo $this->Form->input('celular', array(
        'type' => 'tel',
        'placeholder' => '(XX) 00000-0000',
        'mask' => '(99) 99999-9999'
    ));
    echo $this->Form->input('saldo', array(
        'label' => 'Saldo (R$)',
        'type' => 'number',
        'placeholder' => '0,00',
        'value' => '0.00'
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