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
    /**
     * @var int
     */
    protected $lifetime;
    /**
     * @var string
     */
    protected $param;
    /**
     * @var bool
     */
    protected $buffered;


    public function get(): string
    {
        if(!$this->isBuffered()){
            wp_nonce_field($this->getParam());
            return "";
        }

        ob_start();
        wp_nonce_field($this->getParam());
        $nonce = ob_get_contents();
        ob_end_clean();
        return $nonce;
    }

    /**
     * @return mixed
     */
    public function getLifetime()
    {
        return $this->lifetime;
    }

    /**
     * @param mixed $lifetime
     */
    public function setLifetime($lifetime): void
    {
        $this->lifetime = $lifetime;
    }

    /**
     * @return mixed
     */
    public function getParam(): string
    {
        return $this->param;
    }

    /**
     * @param mixed $param
     */
    public function setParam(string $param): void
    {
        $this->param = $param;
    }

    /**
     * @return bool
     */
    public function isBuffered(): bool
    {
        return $this->buffered;
    }

    /**
     * @param bool $buffered
     */
    public function setBuffered(bool $buffered)
    {
        $this->buffered = $buffered;
    }

}