<?php

namespace App\Services;

interface LookupInterface
{

    public function setParams(array $params);

    public function test();

    public function save();

    public function getResponseTime();

    public function getResponseCode();

    public function getErrorMessage();

}