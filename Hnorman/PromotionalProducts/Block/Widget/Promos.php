<?php
declare(strict_types=1);
namespace Hnorman\PromotionalProducts\Block\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class Promos extends Template implements BlockInterface {

    protected $_template = "widget/promos.phtml";

}
