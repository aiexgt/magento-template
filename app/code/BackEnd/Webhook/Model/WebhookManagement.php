<?php
namespace BackEnd\Webhook\Model;

use BackEnd\Webhook\Api\WebhookManagementInterface;
use BackEnd\Webhook\Api\Data\WebhookInterface;

class WebhookManagement implements WebhookManagementInterface
{
    /**
     * @param WebhookInterface $webhookData
     * @return string
     */
    public function processWebhook(WebhookInterface $webhookData)
    {
        $eventName = $webhookData->getEventName();
        $payload = $webhookData->getPayload();

        // Aquí puedes procesar el webhook según el evento y el payload
        // Por ejemplo, guardar en la base de datos, enviar un email, etc.

        return "Webhook received: Event - $eventName, Payload - $payload";
    }
}