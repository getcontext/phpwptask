<?php
/**
 * Created by PhpStorm.
 * User: wizard
 * Date: 29.08.17
 * Time: 04:18
 */

namespace salamon\wordpress\nonce;

use salamon\wordpress\nonce\nonceverifier\AdminScreenNonceVerifier;
use salamon\wordpress\nonce\nonceverifier\AjaxNonceVerifier;

class NonceVerifierFactory
{
    protected const NONCE_VERIFIER_ADMIN_SCREEN = 500;
    protected const NONCE_VERIFIER_AJAX = 600;

    private static function getVerifier(Nonce $nonce): NonceVerifier
    {

    }

    public static function verify(Nonce $nonce):bool {
        $verifier = new AdminScreenNonceVerifier();
        return $verifier->isValid($nonce);
    }


    public static function verifyAjax(Nonce $nonce):bool {
        $verifier = new AjaxNonceVerifier();
        return $verifier->isValid($nonce);
    }
}
