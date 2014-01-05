<?php
class SortLocastyleHelper extends AppHelper {

    public $helpers = array('Paginator');

    public function getClass($field) {
        if ($this->Paginator->sortKey() == $field) {
            $dir = $this->Paginator->sortDir();
            return $dir == 'desc' ? 'dataDescending' : 'dataAscending';
        }
        return '';
    }

}
?>