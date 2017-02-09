<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TransacParts
 *
 * @author Jing
 */

class TransacPartsRecords extends CI_Model {
// The data comes from http://www.quotery.com/top-100-funny-quotes-of-all-time/?PageSpeed=noscript

    public $data;

    // Constructor
    public function __construct()
    {
        parent::__construct();

        $this->data = array(
            array('partsTrsacID' => '1', 'partID' => '1', 'purchaseID' => '1'),
            array('partsTrsacID' => '2', 'partID' => '2', 'purchaseID' => '1'),
            array('partsTrsacID' => '3', 'partID' => '3', 'purchaseID' => '1'),
            array('partsTrsacID' => '4', 'partID' => '4', 'purchaseID' => '2'),
            array('partsTrsacID' => '5', 'partID' => '5', 'purchaseID' => '2'),
            array('partsTrsacID' => '6', 'partID' => '6', 'purchaseID' => '2'),
            array('partsTrsacID' => '7', 'partID' => '17', 'purchaseID' => '3'),
            array('partsTrsacID' => '8', 'partID' => '17', 'purchaseID' => '3'),
            array('partsTrsacID' => '9', 'partID' => '17', 'purchaseID' => '4'),
            array('partsTrsacID' => '10', 'partID' => '18', 'purchaseID' => '4'),
            array('partsTrsacID' => '11', 'partID' => '16', 'purchaseID' => '5'),
            array('partsTrsacID' => '12', 'partID' => '11', 'purchaseID' => '5'),
            array('partsTrsacID' => '13', 'partID' => '12', 'purchaseID' => '5'),
            array('partsTrsacID' => '14', 'partID' => '13', 'purchaseID' => '6'),
        );

    }

    // retrieve a single quote
    public function get($which)
    {
        // iterate over the data until we find the one we want
        foreach ($this->data as $record)
            if ($record['partsTrsacID'] == $which)
                return $record;
        return null;
    }

    // retrieve all of the quotes
    public function all()
    {
        return $this->data;
    }

}
