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
    public function setParam(string $param): void;

    public function getParam(): string;

    public function setName(string $param): void;

    public function getName(): string;

    public function get(): string;

    public function setLifetime(int $limit): void;

    public function getLifetime(): int;

    public function getId(): string;
}