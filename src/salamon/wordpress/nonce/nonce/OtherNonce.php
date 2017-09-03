<?php
/**
 * Created by PhpStorm.
 * User: wizard
 * Date: 29.08.17
 * Time: 04:29
 */

namespace salamon\wordpress\nonce\nonce;


use salamon\wordpress\nonce\Nonce;

class OtherNonce implements Nonce
{
    /**
     * @var string
     */
    protected $id;
    /**
     * @var int
     */
    protected $lifetime;
    /**
     * @var string
     */
    protected $param;
    /**
     * @var string
     */
    protected $name;

    public function get(): string
    {
        $nonce = wp_create_nonce();
    }

    /**
     * @return int
     */
    public function getLifetime(): int
    {
        return $this->lifetime;
    }

    /**
     * @param int $lifetime
     */
    public function setLifetime(int $lifetime): void
    {
        $this->lifetime = $lifetime;
    }

    /**
     * @return string
     */
    public function getParam(): string
    {
        return $this->param;
    }

    /**
     * @param string $param
     */
    public function setParam(string $param): void
    {
        $this->param = $param;
    }

    public function getId(): string
    {
        if ($this->id) return $this->id;
        $this->id = base64_encode($this->get());
    }


    /**
     * @return mixed
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}