<?php

namespace Sf\Shopfinder\Model;

use Magento\Framework\Model\AbstractModel;
use Sf\Shopfinder\Model\ResourceModel\Shops as ResourceModel;

class Shops extends AbstractModel
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'shop_finders_model';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }



}
