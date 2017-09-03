<?php
/**
 * Created by PhpStorm.
 * User: wizard
 * Date: 29.08.17
 * Time: 04:29
 */

namespace salamon\wordpress\nonce\nonce;


use salamon\wordpress\nonce\Nonce;

class FormNonce implements Nonce
{

    public function get(): string
    {
        // TODO: Implement get() method.
    }


    public function setLifetime(int $limit): void
    {
        // TODO: Implement setLifetime() method.
    }
}