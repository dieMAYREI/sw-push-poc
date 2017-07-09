<?php

namespace DieMayrei\SwPushTest;

use Minishlink\WebPush\WebPush;

class MinishWebpushService implements PushServiceInterface
{
    /** @var WebPush */
    protected $webpush;

    /**
     * MinishWebpushService constructor.
     *
     * @param array $auth The auth information for GCM
     */
    public function __construct(array $auth)
    {
        $this->webpush = new WebPush($auth);
    }

    public function sendMessage(Subscription $subscription, string $message)
    {
        return $this->webpush->sendNotification(
            $subscription->endpoint,
            $message,
            $subscription->key,
            $subscription->token,
            true
        );
    }
}
