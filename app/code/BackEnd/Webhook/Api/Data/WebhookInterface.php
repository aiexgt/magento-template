<?php
namespace BackEnd\Webhook\Api\Data;

interface WebhookInterface
{
    /**
     * Get event name
     *
     * @return string
     */
    public function getEventName();

    /**
     * Set event name
     *
     * @param string $eventName
     * @return $this
     */
    public function setEventName($eventName);

    /**
     * Get payload
     *
     * @return string
     */
    public function getPayload();

    /**
     * Set payload
     *
     * @param string $payload
     * @return $this
     */
    public function setPayload($payload);
}