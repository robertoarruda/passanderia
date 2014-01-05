<h1>Clientes Credores</h1>
<hr>
<?= $this->Element('RelatorioLinks'); ?>
<hr>
<?= $this->Element('dialogModal'); ?>
<table class="tableList">
    <thead>
        <tr>
            <th class="width60">Código</th>
            <th class="txtLeft">Nome</th>
            <th class="txtLeft">Endereço</th>
            <th>Telefone</th>
            <th>Saldo</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $total = 0;
        if (!empty($clientes)) : foreach ($clientes as $cliente):
            $total += $cliente['Cliente']['saldo'];
            ?>
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
                </tr>
            <?php endforeach; ?>
                <tr>
                    <td colspan="4">Total</td>
                    <td><?= $this->ColorNumber->execute($total); ?></td>
                </tr>
        <?php else: ?>
            <tr><td colspan="50" class="alert-error">Nenhum cliente credor encontrado</td></tr>
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