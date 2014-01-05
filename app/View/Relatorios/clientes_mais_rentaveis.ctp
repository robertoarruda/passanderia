<h1>Clientes Mais Rentáveis</h1>
<hr>
<?= $this->Element('RelatorioLinks'); ?>
<hr>
<?= $this->Element('dialogModal'); ?>
<table class="tableList">
    <thead>
        <tr>
            <th class="txtLeft">Cliente</th>
            <th class="width60">Total de Serviços</th>
            <th class="width60">Valor Total de Serviços</th>
            <th>Média (Total Valor / Total Serviços)</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($servicos)) : foreach ($servicos as $servico): ?>
                <tr>
                    <td class="txtLeft">
                        <?=
                        $this->Html->link($servico['Cliente']['nome'], array(
                            'controller' => 'clientes',
                            'action' => 'view',
                            $servico    ['Cliente']['id']), array(
                            'class' => 'ico-link',
                            'data-toggle' => 'modal',
                            'data-target' => '#modalDialog'
                        ));
                        ?>
                    </td>
                    <td><?= $servico['Servico']['servico_count']; ?></td>
                    <td><?= $this->ColorNumber->execute($servico['Servico']['servico_sum']); ?></td>
                    <td><?= $this->ColorNumber->execute($servico['Servico']['servico_rentavel']); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="50" class="alert-error">Nenhum cliente encontrado</td></tr>
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