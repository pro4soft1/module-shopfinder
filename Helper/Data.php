<?php
namespace Sf\Shopfinder\Helper;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Class Data
 *
 * @package \\${NAMESPACE}
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{

    const SHOPIMAGEPATH = 'shop/images/';

    protected StoreManagerInterface $storeManager;

    public function __construct(\Magento\Framework\App\Helper\Context $context, StoreManagerInterface $storeManager)
    {
        parent::__construct($context);
        $this->storeManager = $storeManager;
    }

    /**
     * @param $fileName
     *
     * @return string
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getShopImageUrl($fileName)
    {
        return $this->storeManager
                ->getStore()
                ->getBaseUrl(
                    \Magento\Framework\UrlInterface::URL_TYPE_MEDIA
                ) . self::SHOPIMAGEPATH.$fileName;
    }
}
