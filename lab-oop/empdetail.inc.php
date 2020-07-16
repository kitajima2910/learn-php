<?php

class empdetail {
    var $empid;
    var $empname;
    var $empdetp;
    var $empcity;
    var $empdesign;

    function enteremp($empid, $empname, $empcity) {
        $this->empid = $empid;
        $this->empname = $empname;
        $this->empcity = $empcity;
    }

    function enterdept($empdetp, $empdesign) {
        $this->empdetp = $empdetp;
        $this->empdesign = $empdesign;
    }

}
