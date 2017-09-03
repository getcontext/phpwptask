<?php
/**
 * Created by PhpStorm.
 * User: wizard
 * Date: 29.08.17
 * Time: 04:24
 */

namespace salamon\wordpress\nonce\nonce;


use salamon\wordpress\nonce\Nonce;

class UrlNonce implements Nonce
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
     * @var string
     */
    protected $url;
    /**
     * @var string
     */
    protected $name;

    public function get(): string
    {

        $nonce = wp_nonce_url($this->getUrl(), $this->getParam(), $this->getName());
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
    public function setLifetime($lifetime)
    {
        $this->lifetime = $lifetime;
    }

    /**
     * @return mixed
     */
    public function getParam()
    {
        return $this->param;
    }

    /**
     * @param mixed $param
     */
    public function setParam($param)
    {
        $this->param = $param;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

}