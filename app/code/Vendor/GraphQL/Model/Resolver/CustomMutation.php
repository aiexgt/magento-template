<?php
namespace Vendor\GraphQL\Model\Resolver;

use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\Resolver\ContextInterface;

class CustomMutation implements ResolverInterface
{
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        $input = $args['input'];

        // Lógica para procesar el mutation
        return [
            'message' => "Mutation ejecutado con éxito: $input",
            'status' => true
        ];
    }
}