<?php
declare(strict_types=1);
namespace Hnorman\PromoProducts\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class Listing extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'hnorman_promoproducts_listing';

    protected $_cacheTag = 'hnorman_promoproducts_listing';

    protected $_eventPrefix = 'hnorman_promoproducts_listing';

    protected function _construct()
    {
        $this->_init('Hnorman\PromoProducts\Model\ResourceModel\Listing');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
