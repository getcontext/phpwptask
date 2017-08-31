<?php
/**
 * Created by PhpStorm.
 * User: wizard
 * Date: 29.08.17
 * Time: 04:16
 */
namespace salamon\wordpress\nonce;

interface Nonce
{
    public function get(): string;
    public function setLifetime(int $limit) : void;
}