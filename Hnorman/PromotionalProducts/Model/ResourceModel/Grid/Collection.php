<?php
/**
 * Grid Grid Collection.
 *
 * @package   Hnorman_PromotionalProducts

 */
declare(strict_types=1);
namespace Hnorman\PromotionalProducts\Model\ResourceModel\Grid;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';
    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init(
            'Hnorman\PromotionalProducts\Model\Grid',
            'Hnorman\PromotionalProducts\Model\ResourceModel\Grid'
        );
    }
}
