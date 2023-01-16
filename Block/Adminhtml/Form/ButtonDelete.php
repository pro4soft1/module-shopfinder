<?php

namespace Sf\Shopfinder\Block\Adminhtml\Form;

use Magento\Backend\Block\Widget\Context;
use Magento\Cms\Api\PageRepositoryInterface;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Cms\Block\Adminhtml\Page\Edit\GenericButton;

/**
 * Back to list button.
 */
class ButtonDelete extends GenericButton implements ButtonProviderInterface
{
    public function __construct(Context $context, PageRepositoryInterface $pageRepository)
    {
        parent::__construct($context, $pageRepository);
    }

    /**
     *
     * /**
     * @return array
     */
    public function getButtonData()
    {

        $data = [];
        if ($this->getShopId()) {
            $data = [
                'label' => __('Delete Shop'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\''
                    . __('Are you sure you want to delete this Shop ?')
                    . '\', \'' . $this->getDeleteUrl() . '\')',
                'sort_order' => 20,
            ];
        }
        return $data;
    }

    /**
     * @return string
     */
    public function getDeleteUrl()
    {

        return $this->getUrl('*/*/delete', ['id' => $this->getShopId()]);
    }


    public function getShopId()
    {
        return $this->context->getRequest()->getParam('id');
    }
}
