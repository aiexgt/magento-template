<?php
namespace BackEnd\Webhook\Api;

interface WebhookManagementInterface
{
    /**
     * Process webhook data
     *
     * @param \BackEnd\Webhook\Api\Data\WebhookInterface $webhookData
     * @return string
     */
    public function processWebhook(\BackEnd\Webhook\Api\Data\WebhookInterface $webhookData);
}