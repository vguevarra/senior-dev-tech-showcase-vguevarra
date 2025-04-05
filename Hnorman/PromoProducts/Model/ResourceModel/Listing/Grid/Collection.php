<?php
declare(strict_types=1);

namespace Hnorman\PromoProducts\Model\ResourceModel\Listing\Grid;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'hnorman_promoproducts_listing_collection';
    protected $_eventObject = 'listing_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init('Hnorman\PromoProducts\Model\Listing',
            'Hnorman\PromoProducts\Model\ResourceModel\Listing');
    }

}
