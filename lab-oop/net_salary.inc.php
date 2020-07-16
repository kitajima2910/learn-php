<?php

include "salary.inc.php";

class net_salary extends salary {
    public function net($basic) {
        $hra = $this->hra_calc($basic);
        $ta = $this->travelallow_calc($basic);
        $tax = $this->tax_calc($basic);
        return $basic + ($hra + $ta) - $tax;
    }
}