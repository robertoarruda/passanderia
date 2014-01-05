<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Serviço</h3>
</div>
<div class="modal-body">
    <?php
    $this->Number->addFormat(
        'BRR',
        array(
            'before' => 'R$ ',
            'places' => 2,
            'zero' => '',
            'thousands' => '.',
            'decimals' => ','
        )
    );
    $this->Number->defaultCurrency('BRR');
    ?>
    <p><strong>Código: </strong><?= $servico['Servico']['id']; ?></p>
    <p><strong>Cliente: </strong><?= $servico['Cliente']['nome']; ?></p>
    <p><strong>Data de Abertura: </strong><?= $this->Time->format('d/m/Y', $servico['Servico']['data_abertura']); ?></p>
    <p><strong>Data de Fechamento: </strong><?= ($servico['Servico']['data_fechamento']) ? $this->Time->format('d/m/Y', $servico['Servico']['data_fechamento']) : ''; ?></p>
    <p><strong>Valor: </strong><?= ($servico['Servico']['valor']) ? $this->Number->currency($servico['Servico']['valor']) : ''; ?></p>
    <p><strong>Valor Pago: </strong><?= $this->Number->currency($servico['Servico']['valor_pago']); ?></p>
    <p><strong>Comentários: </strong><?= $servico['Servico']['comentarios']; ?></p>
</div>
<div class="modal-footer">
    <?php
    echo $this->Html->link('Fechar', '#', array('div' => false,
        'class' => 'btn btn-fechar',
        'data-dismiss' => 'modal'
    ));
    ?>
</div>