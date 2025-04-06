<?php
declare(strict_types=1);
namespace Hnorman\PromotionalProducts\Block\Adminhtml\Grid\Edit;

use Hnorman\PromotionalProducts\Model\Status;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Data\FormFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;

/**
 * Adminhtml Add New Row Form.
 * Considered adding wysiwyg for banner creation
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;

    /**
     * @param Context $context,
     * @param Registry $registry,
     * @param FormFactory $formFactory,
     * @param \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
     * @param Status $options,
     */
    public function __construct(
        Context $context,
        Registry $registry,
        FormFactory $formFactory,
    //    \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        Status $options,
        array $data = []
    ) {
        $this->_options = $options;
    //    $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form.
     *
     * @return $this
     * @throws LocalizedException
     */
    protected function _prepareForm()
    {
        $dateFormat = $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT);
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create(
            ['data' => [
                'id' => 'edit_form',
                'enctype' => 'multipart/form-data',
                'action' => $this->getData('action'),
                'method' => 'post'
                ]
            ]
        );

        $form->setHtmlIdPrefix('promogrid_');
        if ($model->getEntityId()) {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Edit Row Data'), 'class' => 'fieldset-wide']
            );
            $fieldset->addField('entity_id', 'hidden', ['name' => 'entity_id']);
        } else {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Add Row Data'), 'class' => 'fieldset-wide']
            );
        }

        $fieldset->addField(
            'sku',
            'text',
            [
                'name' => 'sku',
                'label' => __('Sku'),
                'id' => 'Sku',
                'title' => __('Sku'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'price',
            'text',
            [
                'name' => 'price',
                'label' => __('Price'),
                'id' => 'price',
                'title' => __('Price'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'discount',
            'text',
            [
                'name' => 'discount',
                'label' => __('Discount'),
                'id' => 'discount',
                'title' => __('Discount'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
//
//        $wysiwygConfig = $this->_wysiwygConfig->getConfig(['tab_id' => $this->getTabId()]);
//
//        $fieldset->addField(
//            'content',
//            'editor',
//            [
//                'name' => 'content',
//                'label' => __('Content'),
//                'style' => 'height:36em;',
//                'required' => true,
//                'config' => $wysiwygConfig
//            ]
//        );

        $fieldset->addField(
            'date_start',
            'date',
            [
                'name' => 'date_start',
                'label' => __('Date Start'),
                'date_format' => $dateFormat,
                'time_format' => 'H:mm:ss',
                'class' => 'validate-date validate-date-range date-range-custom_theme-from',
                'class' => 'required-entry',
                'style' => 'width:200px',
            ]
        );

        $fieldset->addField(
            'date_end',
            'date',
            [
                'name' => 'date_end',
                'label' => __('Date End'),
                'date_format' => $dateFormat,
                'time_format' => 'H:mm:ss',
                'class' => 'validate-date validate-date-range date-range-custom_theme-from',
                'class' => 'required-entry',
                'style' => 'width:200px',
            ]
        );

        $fieldset->addField(
            'status',
            'select',
            [
                'name' => 'status',
                'label' => __('Status'),
                'id' => 'is_active',
                'title' => __('Status'),
                'values' => $this->_options->getOptionArray(),
                'class' => 'status',
                'required' => true,
            ]
        );
        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
