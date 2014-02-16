<h1>Serviços</h1>
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
echo $this->Form->create('Filtro', array('class' => 'filtro'));
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
            <th class="width60">Código</th>
            <th class="txtLeft">Cliente</th>
            <th>Data de Abertura</th>
            <th>Data de Fechamento</th>
            <th>Valor do Serviço</th>
            <th>Valor Pago</th>
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
                    <td>
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
                    <td><?= $this->Number->currency($servico['Servico']['valor']); ?></td>
                    <td>
                        <?php
                        if (!empty($servico['Pagamento']['valor'])) {
                            echo $this->Html->link($this->Number->currency($servico['Pagamento']['valor']), array(
                                'controller' => 'pagamentos',
                                'action' => 'view',
                                $servico['Pagamento']['id']), array(
                                'class' => 'ico-link',
                                'data-toggle' => 'modal',
                                'data-target' => '#modalDialog'
                            ));
                        } else {
                            if ($servico['Servico']['data_fechamento']) {
                                echo $this->Html->link('Lançar Pagamento', array(
                                    'controller' => 'pagamentos',
                                    'action' => 'lancar',
                                    $servico['Servico']['id']), array(
                                    'class' => 'btn btn-primary ico-close'
                                ));
                            }
                        }
                        ?>
                    </td>
                    <td class="control-group">
                        <?php
                        if (empty($servico['Servico']['data_fechamento'])) {
                            echo $this->Html->link('Editar', array(
                                'action' => 'editar',
                                $servico['Servico']['id']), array(
                                'class' => 'btn ico-edit'
                            ));
                            echo $this->Form->postLink('Excluir', array(
                                'action' => 'excluir',
                                $servico['Servico']['id']), array(
                                'class' => 'btn btn-danger ico-trash',
                                'confirm' => 'Deseja realmente excluir este registro?'
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
<div class="row-fluid btn-voltar">
    <div class="fright span1">
        <?= $this->Html->link('Voltar', '/', array('class' => 'btn btn-inverse ico-reply btn-large')); ?>
    </div>
</div>