<?php
/**
 * Created by PhpStorm.
 * User: wizard
 * Date: 31.08.17
 * Time: 01:11
 */

namespace salamon\wordpress\nonce;

//service facade
final class NonceService
{

    private $nonces;

    /**
     * NonceService constructor.
     */
    public function __construct()
    {
    }

    public function getUrlNonce(string $param): Nonce
    {
        $nonce = NonceFactory::getUrlNonce($param);
        return $nonce;
    }

    public function getFormNonce(string $param): Nonce
    {
        $nonce = NonceFactory::getFormNonce($param);
        return $nonce;
    }

    public function getOtherNonce(string $param): Nonce
    {
        $nonce = NonceFactory::getOtherNonce($param);
        return $nonce;
    }

    public function verifyNonce(Nonce $nonce): ?bool
    {
        $result = null;
        $result = NonceVerifierFactory::verify($nonce);
        return $result;
    }

    public function verifyAjaxNonce(Nonce $nonce): ?bool
    {
        $result = null;
        $result = NonceVerifierFactory::verifyAjax($nonce);
        return $result;
    }

    public function applyNonceLifetime(int $seconds): void
    {
        add_filter('nonce_life', $seconds);
    }
}