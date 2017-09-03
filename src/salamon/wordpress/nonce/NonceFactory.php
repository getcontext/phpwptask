<?php
/**
 * Created by PhpStorm.
 * User: wizard
 * Date: 29.08.17
 * Time: 04:18
 */

namespace salamon\wordpress\nonce;

/*static*/
use salamon\wordpress\nonce\nonce\ErrorNonce;
use salamon\wordpress\nonce\nonce\FormNonce;
use salamon\wordpress\nonce\nonce\OtherNonce;
use salamon\wordpress\nonce\nonce\UrlNonce;

class NonceFactory
{
    public const LIFETIME_NONCE = 3600;

    protected const NONCE_URL = 500;
    protected const NONCE_FORM = 600;
    protected const NONCE_OTHER = 700;

    private static function getNonce(int $nonce): Nonce
    {
        $nonceObj = null;
        switch ($nonce) {
            case self::NONCE_URL:
                $nonceObj = new UrlNonce();
                break;
            case self::NONCE_FORM:
                $nonceObj = new FormNonce();
                break;
            case self::NONCE_OTHER:
                $nonceObj = new OtherNonce();
                break;
            default:
                $nonceObj = new ErrorNonce();
                break;
        }

        $nonceObj->setLifetime(self::LIFETIME_NONCE);

        return $nonceObj;
    }

    public static function getUrlNonce(string $data, string $param = null, string $name = '_wpnonce'): Nonce
    {
        $nonce = self::getNonce(self::NONCE_URL);
        $nonce->setUrl($data);
        $nonce->setParam($param);
        $nonce->setName($name);
        return $nonce;
    }

    //not buffered will be printed directly
    public static function getFormNonce(string $data, bool $buffered = true): ?Nonce
    {

        $nonce = self::getNonce(self::NONCE_FORM);
        $nonce->setParam($data);
        $nonce->setBuffered($buffered);
        return $nonce;
    }

    public static function getOtherNonce(string $data): Nonce
    {

        $nonce = self::getNonce(self::NONCE_OTHER);
        $nonce->setParam($data);
        return $nonce;
    }

}