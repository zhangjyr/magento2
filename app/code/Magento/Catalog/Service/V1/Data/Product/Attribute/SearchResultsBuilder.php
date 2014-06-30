<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @copyright   Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Magento\Catalog\Service\V1\Data\Product\Attribute;

use Magento\Framework\Service\Data\ObjectFactory;
use Magento\Framework\Service\V1\Data\SearchCriteriaBuilder;
use Magento\Framework\Service\V1\Data\AbstractSearchResultsBuilder;
use Magento\Catalog\Service\V1\Data\Eav\AttributeBuilder;

/**
 * Builder for the SearchResults Service Data Object
 *
 * @method \Magento\Catalog\Service\V1\Data\Product\Attribute\SearchResults create()
 */
class SearchResultsBuilder extends \Magento\Framework\Service\V1\Data\AbstractSearchResultsBuilder
{
    /**
     * Constructor
     *
     * @param ObjectFactory $objectFactory
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param AttributeBuilder $attributeBuilder
     */
    public function __construct(
        ObjectFactory $objectFactory,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        AttributeBuilder $attributeBuilder
    ) {
        parent::__construct($objectFactory, $searchCriteriaBuilder, $attributeBuilder);
    }

    /**
     * Set items
     *
     * @param \Magento\Catalog\Service\V1\Data\Eav\Attribute[] $items
     * @return $this
     */
    public function setItems($items)
    {
        return parent::setItems($items);
    }
}
