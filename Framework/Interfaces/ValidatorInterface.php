<?php

namespace Framework\Interfaces;

interface ValidatorInterface {
    public function validate($src);

    public function isValid($src);

    public function getErrorMessage();
}