<?php
/**
 * Created by PhpStorm.
 * User: wizard
 * Date: 03.09.17
 * Time: 22:51
 */

namespace salamon\wordpress\nonce\nonceverifier;


use salamon\wordpress\nonce\Nonce;
use salamon\wordpress\nonce\NonceVerifier;

class OtherNonceVerifier implements NonceVerifier
{

    public function isValid(Nonce $nonce): bool
    {
        wp_verify_nonce($nonce->getName(), $nonce->getParam());
    }
}