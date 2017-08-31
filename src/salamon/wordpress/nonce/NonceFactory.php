<?php
/**
 * Created by PhpStorm.
 * User: wizard
 * Date: 29.08.17
 * Time: 04:18
 */

namespace salamon\wordpress\nonce;

/*static*/class NonceFactory
{
    protected const NONCE_URL = 500;
    protected const NONCE_FORM = 600;
    protected const NONCE_OTHER = 700;

    private static function getNonce(int $nonce): Nonce
    {

    }

    public static function getUrlNonce(string $data): Nonce
    {

    }

    //not buffered will be printed directly
    public static function getFormNonce(string $data, bool $buffered = true): ?Nonce
    {

    }

    public static function getOtherNonce(string $data): Nonce
    {

    }

}