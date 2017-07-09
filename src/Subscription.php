<?php

namespace DieMayrei\SwPushTest;

class Subscription
{
    /** @var string */
    public $endpoint;
    /** @var string */
    public $key;
    /** @var string */
    public $token;

    /**
     * Return an unique identifier for the subscription.
     *
     * @return mixed
     */
    public function getId()
    {
        return sha1($this->endpoint);
    }
}
