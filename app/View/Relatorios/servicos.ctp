<h1>Serviços</h1>
<hr>
<?= $this->Element('RelatorioLinks'); ?>
<hr>
<?= $this->Element('dialogModal'); ?>
<?php
echo $this->Form->create('Filtro');
echo $this->Form->input('de', array(
    'label' => 'Início (Data de Abertura)',
    'type' => 'text',
    'class' => 'datepicker'
));
echo $this->Form->input('ate', array(
    'label' => 'Fim (Data de Abertura)',
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
            <th class="width60">Código</th>
            <th class="txtLeft">Cliente</th>
            <th>Data de Abertura</th>
            <th>Data de Fechamento</th>
            <th>Valor do Serviço</th>
            <th>Valor Pago</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $totalServico = 0;
        $totalPago = 0;
        if (!empty($servicos)) : foreach ($servicos as $servico):
            $totalServico += $servico['Servico']['valor'];
            $totalPago += $servico['Pagamento']['valor'];
            ?>
                <tr>
                    <td>
                        <?=
                        $this->Html->link($servico['Servico']['id'], array(
                            'controller' => 'servicos',
                            'action' => 'view',
                            $servico['Servico']['id']), array(
                            'class' => 'ico-link',
                            'data-toggle' => 'modal',
                            'data-target' => '#modalDialog'
                        ));
                        ?>
                    </td>
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
                    <td><?= $this->Time->format('d/m/Y', $servico['Servico']['data_abertura']); ?></td>
                    <td>
                        <?php
                        if ($servico['Servico']['data_fechamento']) {
                            echo $this->Time->format('d/m/Y', $servico['Servico']['data_fechamento']);
                        }
                        ?>
                    </td>
                    <td><?= $this->ColorNumber->execute($servico['Servico']['valor']); ?></td>
                    <td><?= $this->ColorNumber->execute($servico['Pagamento']['valor']); ?></td>
                </tr>
            <?php endforeach; ?>
                <tr>
                    <td colspan="4">Total</td>
                    <td><?= $this->ColorNumber->execute($totalServico); ?></td>
                    <td><?= $this->ColorNumber->execute($totalPago); ?></td>
                </tr>
        <?php else: ?>
            <tr><td colspan="50" class="alert-error">Nenhum serviço encontrado</td></tr>
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