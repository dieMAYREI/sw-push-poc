<?php

namespace DieMayrei\SwPushTest;

interface PushServiceInterface
{
    /**
     * Sends a message.
     *
     * @param Subscription $subscription
     * @param string       $message
     */
    public function sendMessage(Subscription $subscription, string $message);
}
