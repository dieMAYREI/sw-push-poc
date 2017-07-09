<?php

namespace DieMayrei\SwPushTest;

interface StorageInterface
{
    /**
     * Get all saved subscriptions.
     *
     * @return array|\Traversable|Subscription[]
     */
    public function getAll();

    /**
     * Store/update an subscription.
     *
     * @param Subscription $subscription
     */
    public function store(Subscription $subscription);

    /**
     * Unsubscribe.
     *
     * @param Subscription $subscription
     */
    public function delete(Subscription $subscription);
}
