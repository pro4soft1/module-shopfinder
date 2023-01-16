<?php

namespace Sf\Shopfinder\Block\Adminhtml\Form;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
//use Sf\Shopfinder\Block\Form\Entity\GenericButton;
use Magento\Cms\Block\Adminhtml\Page\Edit\GenericButton;
/**
 * Back to list button.
 */
class ButtonBack extends GenericButton implements ButtonProviderInterface
{
    /**
     * Retrieve Back To Grid button settings.
     *
     * @return array
     */
    public function getButtonData(): array
    {
        return $this->wrapButtonSettings(
            __('Back To Grid')->getText(),
            'back',
            sprintf("location.href = '%s';", $this->getUrl('*/*/')),
            [],
            10
        );
    }
}
