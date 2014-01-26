<h1>Serviços por Cliente</h1>
<hr>
<?= $this->Element('RelatorioLinks'); ?>
<hr>
<?= $this->Element('dialogModal'); ?>
<?php
echo $this->Form->create('Filtro');
echo $this->Form->input('de', array(
    'label' => 'Início (Data de Fechamento)',
    'type' => 'text',
    'class' => 'datepicker'
));
echo $this->Form->input('ate', array(
    'label' => 'Fim (Data de Fechamento)',
    'type' => 'text',
    'class' => 'datepicker'
));
echo $this->Form->input('status', array(
    'class' => 'customSelect',
    'data-placeholder' => 'Selecione...',
    'default' => 'all',
    'type' => 'select',
    'options' => array(
        'all' => 'Todos',
        'aberto' => 'Aberto',
        'fechado' => 'Fechado',
        'pago' => 'Pago'
)));
echo $this->Form->end(array('label' => 'Buscar', 'class' => 'btn btn-primary'));
?>
<table class="tableList">
    <thead>
        <tr>
            <th class="txtLeft">Cliente</th>
            <th class="width60">Total de Serviços</th>
            <th class="width60">Valor Total de Serviços</th>
    </thead>
    <tbody>
        <?php if (!empty($servicos)) : foreach ($servicos as $servico): ?>
                <tr>
                    <td class="txtLeft">
                        <?=
                        $this->Html->link($servico['Cliente']['nome'], array(
                            'controller' => 'clientes',
                            'action' => 'view',
                            $servico['Cliente']['id']), array(
                            'class' => 'ico-link',
                            'data-toggle' => 'modal',
                            'data-target' => '#modalDialog'
                        ));
                        ?>
                    </td>
                    <td><?= $servico['Servico']['servico_count']; ?></td>
                    <td><?= $this->ColorNumber->execute($servico['Servico']['servico_sum']); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="50" class="alert-error">Nenhum cliente devedor encontrado</td></tr>
        <?php endif; ?>
    </tbody>
</table>
<div class="row-fluid btn-voltar">
    <div class="fright span1">
        <?=
        $this->Html->link('Voltar', array(
            'controller' => 'relatorios',
            'action' => 'index'), array(
            'class' => 'btn btn-inverse ico-reply btn-large'
        ));
        ?>
    </div>
</div>