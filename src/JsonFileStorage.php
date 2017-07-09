<?php

namespace DieMayrei\SwPushTest;

class JsonFileStorage implements StorageInterface
{
    protected $filename;
    protected $data;

    public function __construct(string $filename)
    {
        $this->filename = $filename;

        if (!file_exists($this->filename)) {
            touch($this->filename);
        }

        $this->data = (array) json_decode(file_get_contents($this->filename));
        foreach ($this->data as $key => $subdata) {
            $sub = new Subscription();
            $sub->endpoint = $subdata->endpoint;
            $sub->key = $subdata->key;
            $sub->token = $subdata->token;
            $this->data[$key] = $sub;
        }
    }

    /**
     * Write to JSON File.
     */
    protected function persist()
    {
        file_put_contents($this->filename, json_encode($this->data, JSON_PRETTY_PRINT));
    }

    public function getAll()
    {
        return $this->data;
    }

    public function store(Subscription $subscription)
    {
        $this->data[$subscription->getId()] = $subscription;
        $this->persist();
    }

    public function delete(Subscription $subscription)
    {
        unset($this->data[$subscription->getId()]);
        $this->persist();
    }
}
