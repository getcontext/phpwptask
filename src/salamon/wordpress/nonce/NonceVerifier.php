<?php
/**
 * Created by PhpStorm.
 * User: wizard
 * Date: 29.08.17
 * Time: 19:42
 */

namespace salamon\wordpress\nonce;


interface NonceVerifier
{
    public function isValid(Nonce $nonce) : bool;
}