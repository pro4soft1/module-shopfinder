<?php

namespace Sf\Shopfinder\Block\Adminhtml\Form;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Ui\Component\Control\Container;

/**
 * Save entity button.
 */
class ButtonSave extends \Magento\Cms\Block\Adminhtml\Block\Edit\GenericButton implements ButtonProviderInterface
{
    /**
     * Retrieve Save button settings.
     *
     * @return array
     */
    public function getButtonData(): array
    {

        return [
            'label' => $this->getButtonLabel(),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => [
                    'buttonAdapter' => [
                        'actions' => [
                            [
                                'targetName' => 'Shopfinder.Shopfinder',
                                'actionName' => 'save',
                            ]
                        ]
                    ]
                ]
            ],
            'class_name' => Container::DEFAULT_CONTROL,
        ];
    }

    public function getButtonLabel()
    {
        $label = __('Save Shop');
        if ($this->getShopId()) {
            $label = __('Update Shop');
        }
        return $label;
    }

    public function getShopId()
    {
        return $this->context->getRequest()->getParam('id');
    }
}
