<?php

namespace Sf\Shopfinder\Model\ResourceModel\Shops;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Sf\Shopfinder\Model\ResourceModel\Shops as ResourceModel;
use Sf\Shopfinder\Model\Shops as Model;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'shop_finders_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
