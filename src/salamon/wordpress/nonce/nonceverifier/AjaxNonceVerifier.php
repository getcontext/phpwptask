<?php
/**
 * Created by PhpStorm.
 * User: wizard
 * Date: 29.08.17
 * Time: 19:42
 */

namespace salamon\wordpress\nonce\nonceverifier;


use salamon\wordpress\nonce\Nonce;
use salamon\wordpress\nonce\NonceVerifier;

class AjaxNonceVerifier implements NonceVerifier
{

    public function isValid(Nonce $nonce): bool
    {
        check_ajax_referer($nonce->getParam());
    }
}