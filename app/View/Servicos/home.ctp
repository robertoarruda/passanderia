<h1>Home</h1>
<hr>
<?php
echo $this->Element('dialogModal');
$this->Number->addFormat('BRR', array(
    'before' => 'R$ ',
    'places' => 2,
    'zero' => '',
    'thousands' => '.',
    'decimals' => ','
));
$this->Number->defaultCurrency('BRR');
?>
<div class="row-fluid btn-new">
    <div class="fright span2">
        <?=
        $this->Html->link('Abertura de Serviço', array(
            'controller' => 'servicos',
            'action' => 'abertura'), array(
            'class' => 'btn btn-success ico-plus btn-large'
        ));
        ?>
    </div>
</div>
<table class="tableList">
    <thead>
        <tr>
            <th class="width60 <?= $this->SortLocastyle->getClass('codigo'); ?>">Código</th>
            <th class="txtLeft">Cliente</th>
            <th>Data de Abertura</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($servicos)) : foreach ($servicos as $servico): ?>
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
                    <td class="control-group">
                        <?php
                        if ($servico['Servico']['data_fechamento']) {
                            echo $this->Time->format('d/m/Y', $servico['Servico']['data_fechamento']);
                        } else {
                            echo $this->Html->link('Fechar Serviço', array(
                                'action' => 'fechamento',
                                $servico['Servico']['id']), array(
                                'class' => 'btn btn-primary ico-close'
                            ));
                        }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="50" class="alert-error">Nenhum serviço encontrado</td></tr>
        <?php endif; ?>
    </tbody>
</table>