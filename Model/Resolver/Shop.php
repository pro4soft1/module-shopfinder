<?php

namespace Sf\Shopfinder\Model\Resolver;

use Magento\Authorization\Model\UserContextInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlAuthorizationException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\Resolver\ContextInterface;
use Magento\Framework\GraphQl\Query\Resolver\Value;
use Magento\Framework\GraphQl\Query\Resolver\ValueFactory;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Framework\Webapi\ServiceOutputProcessor;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Sf\Shopfinder\Api\ShopRepositoryInterface;
use Sf\Shopfinder\Model\Shops;
use Sf\Shopfinder\Model\ShopsFactory;

/**
 * Class Shop
 *
 * @package \\${NAMESPACE}
 */
class Shop implements \Magento\Framework\GraphQl\Query\ResolverInterface
{

    /**
     * @var \Sf\Shopfinder\Model\ShopsFactory
     */
    private ShopsFactory $shopsFactory;
    /**
     * @var \Magento\Framework\GraphQl\Query\Resolver\ValueFactory
     */
    private ValueFactory $valueFactory;
    /**
     * @var \Magento\Framework\Webapi\ServiceOutputProcessor
     */
    private ServiceOutputProcessor $serviceOutputProcessor;
    /**
     * @var \Magento\Framework\Api\ExtensibleDataObjectConverter
     */
    private ExtensibleDataObjectConverter $dataObjectConverter;

    public function __construct(
        ValueFactory                  $valueFactory,
         ServiceOutputProcessor        $serviceOutputProcessor,
        ExtensibleDataObjectConverter $dataObjectConverter,
         ShopsFactory                  $shopsFactory
    )
    {
        $this->shopsFactory = $shopsFactory;
        $this->valueFactory = $valueFactory;
         $this->serviceOutputProcessor = $serviceOutputProcessor;
        $this->dataObjectConverter = $dataObjectConverter;
     }


    /**
     * @inheritDoc
     */
    public function resolve(\Magento\Framework\GraphQl\Config\Element\Field $field, $context, \Magento\Framework\GraphQl\Schema\Type\ResolveInfo $info, array $value = null, array $args = null)
    {
        if (!isset($args['id'])) {
            throw new \Magento\Framework\Exception\NoSuchEntityException(__('ID field is required'));
        }
        try {
            $shopDetails = $this->getShopDetails($args['id']);
            $result = function () use ($shopDetails) {
                return !empty($shopDetails) ? $shopDetails : [];
            };
            return $this->valueFactory->create($result);

        }catch (NoSuchEntityException $e) {
            throw new GraphQlNoSuchEntityException(__($e->getMessage()));
        }


    }

    /**
     * @throws \Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException
     */
    public function getShopDetails($id)
    {
        /**
         * @var $shop Shops
         */
        $shop = $this->shopsFactory->create()->load($id);
        if (!$shop->getId()) {
            throw new GraphQlNoSuchEntityException(__('Shop is not found'));
        }
        return $shop->getData();

    }

}
