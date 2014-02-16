<h1>Clientes</h1>
<hr>
<?= $this->Element('dialogModal'); ?>
<?php
echo $this->Form->create('Filtro', array('class' => 'filtro'));
echo $this->Form->input('cliente', array(
    'type' => 'text',
    'placeholder' => 'Nome do cliente'
));
echo $this->Form->end(array('label' => 'Buscar', 'class' => 'btn btn-primary'));
?>
<div class="row-fluid btn-new">
    <div class="fright span2">
        <?php
        echo $this->Html->link('Cadastrar Cliente', array(
            'controller' => 'clientes',
            'action' => 'cadastrar'), array(
            'class' => 'btn btn-success ico-plus btn-large'
        ));
        ?>
    </div>
</div>
<table class="tableList">
    <thead>
        <tr>
            <th class="width60">Código</th>
            <th class="txtLeft">Nome</th>
            <th class="txtLeft">Endereço</th>
            <th class="width60">Telefone</th>
            <th class="width60">Saldo</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($clientes)) : foreach ($clientes as $cliente): ?>
                <tr>
                    <td><?= $cliente['Cliente']['id']; ?></td>
                    <td class="txtLeft">
                        <?=
                        $this->Html->link($cliente['Cliente']['nome'], array(
                            'controller' => 'clientes',
                            'action' => 'view',
                            $cliente['Cliente']['id']), array(
                            'class' => 'ico-link',
                            'data-toggle' => 'modal',
                            'data-target' => '#modalDialog'
                        ));
                        ?>
                    </td>
                    <td class="txtLeft"><?= $cliente['Cliente']['endereco']; ?></td>
                    <td><?= $cliente['Cliente']['telefone']; ?></td>
                    <td><?= $this->ColorNumber->execute($cliente['Cliente']['saldo']); ?></td>
                    <td class="control-group">
                        <?php
                        echo $this->Html->link('Editar', array(
                            'action' => 'editar',
                            $cliente['Cliente']['id']), array(
                            'class' => 'btn ico-edit'
                        ));
                        echo $this->Html->link('Alterar Saldo', array(
                            'action' => 'alterar_saldo',
                            $cliente['Cliente']['id']), array(
                            'class' => 'btn btn-primary ico-edit'
                        ));
                        echo $this->Form->postLink('Excluir', array(
                            'action' => 'excluir',
                            $cliente['Cliente']['id']), array(
                            'class' => 'btn btn-danger ico-trash',
                            'confirm' => 'Deseja realmente excluir este registro?'
                        ));
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="50" class="alert-error">Nenhum cliente encontrado</td></tr>
        <?php endif; ?>
    </tbody>
</table>
<div class="row-fluid btn-voltar">
    <div class="fright span1">
        <?= $this->Html->link('Voltar', '/', array('class' => 'btn btn-inverse ico-reply btn-large')); ?>
    </div>
</div>