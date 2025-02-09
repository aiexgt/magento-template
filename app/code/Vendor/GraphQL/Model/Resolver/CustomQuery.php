<?php
namespace Vendor\GraphQL\Model\Resolver;

use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\Resolver\ContextInterface;

class CustomQuery implements ResolverInterface
{
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        $param = $args['param'];

        // Lógica para procesar el query
        return [
            'message' => "Query ejecutado con éxito: $param",
            'status' => true
        ];
    }
}