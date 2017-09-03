<?php
/**
 * Created by PhpStorm.
 * User: wizard
 * Date: 31.08.17
 * Time: 01:11
 */

namespace salamon\wordpress\nonce;

//service facade
use salamon\wordpress\nonce\nonce\FormNonce;
use salamon\wordpress\nonce\nonce\OtherNonce;
use function Sodium\add;

final class NonceService
{

    private $nonces = [];

    /**
     * NonceService constructor.
     */
    public function __construct()
    {
    }

    public function getUrlNonce(string $param): Nonce
    {
        $nonce = NonceFactory::getUrlNonce($param);
        $this->addNonce($nonce);
        return $nonce;
    }

    public function getFormNonce(string $param): FormNonce
    {
        $nonce = NonceFactory::getFormNonce($param);
        $this->addNonce($nonce);
        return $nonce;
    }

    public function getOtherNonce(string $param): OtherNonce
    {
        $nonce = NonceFactory::getOtherNonce($param);
        $this->addNonce($nonce);
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

    private function addNonce(Nonce $nonce): void
    {
        array_push($this->nonces, $nonce);
    }
}