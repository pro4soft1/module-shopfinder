<?php

namespace Sf\Shopfinder\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Shops extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'shop_finders_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('shop_finders', 'entity_id');
        $this->_useIsObjectNew = true;
    }
}
