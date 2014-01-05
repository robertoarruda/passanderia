<?php
class ColorNumberHelper extends AppHelper {
    
    public $helpers = array('Number');

    public function execute($num) {
        $this->Number->addFormat('BRR', array(
            'before' => 'R$ ',
            'places' => 2,
            'zero' => '',
            'thousands' => '.',
            'decimals' => ','
        ));
        $this->Number->defaultCurrency('BRR');
        if ($num > 0) {
            return "<span class=\"text-info\">{$this->Number->currency($num)}</span>";
        } elseif ($num < 0) {
            return "<span class=\"text-error\">{$this->Number->currency($num)}</span>";
        } else {
            return $this->Number->currency($num);
        }
    }

}