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

namespace Magento\Downloadable\Test\Fixture;

use Mtf\Fixture\InjectableFixture;
use Mtf\System\Config;
use Mtf\Handler\HandlerFactory;
use Mtf\Fixture\FixtureFactory;
use Mtf\Repository\RepositoryFactory;
use Mtf\System\Event\EventManagerInterface;

/**
 * Class CatalogProductDownloadable
 * Fixture for Downloadable product
 *
 * @SuppressWarnings(PHPMD.ExcessivePublicCount)
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class CatalogProductDownloadable extends InjectableFixture
{
    /**
     * @var string
     */
    protected $repositoryClass = 'Magento\Downloadable\Test\Repository\DownloadableProduct';

    /**
     * @var string
     */
    protected $handlerInterface = 'Magento\Downloadable\Test\Handler\Curl\CreateDownloadable';

    /**
     * Constructor
     *
     * @constructor
     * @param Config $configuration
     * @param RepositoryFactory $repositoryFactory
     * @param FixtureFactory $fixtureFactory
     * @param HandlerFactory $handlerFactory
     * @param EventManagerInterface $eventManager
     * @param array $data
     * @param string $dataSet
     * @param bool $persist
     */
    public function __construct(
        Config $configuration,
        RepositoryFactory $repositoryFactory,
        FixtureFactory $fixtureFactory,
        HandlerFactory $handlerFactory,
        EventManagerInterface $eventManager,
        array $data = [],
        $dataSet = '',
        $persist = false
    ) {
        parent::__construct(
            $configuration,
            $repositoryFactory,
            $fixtureFactory,
            $handlerFactory,
            $eventManager,
            $data,
            $dataSet,
            $persist
        );

        if (!isset($this->data['url_key']) && isset($this->data['name'])) {
            $this->data['url_key'] = trim(strtolower(preg_replace('#[^0-9a-z%]+#i', '-', $this->data['name'])), '-');
        }

    }

    protected $dataConfig = [
        'create_url_params' => [
            'type' => 'downloadable',
            'set' => '4',
        ],
        'input_prefix' => 'product',
    ];

    protected $defaultDataSet = [
        'name' => 'DownloadableProduct_%isolation%',
        'sku' => 'DownloadableProduct_%isolation%',
        'price' => '100',
        'tax_class_id' => ['dataSet' => 'Taxable Goods'],
        'description' => 'This is description for downloadable product',
        'short_description' => 'This is short description for downloadable product',
        'quantity_and_stock_status_qty' => '1',
        'quantity_and_stock_status' => 'In Stock',
        'is_virtual' => 'Yes',
        'downloadable_links' => ['preset' => 'default'],
    ];

    protected $category_ids = [
        'attribute_code' => 'category_ids',
        'backend_type' => 'static',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'text',
        'fixture' => 'Magento\Catalog\Test\Fixture\CategoryIds'
    ];

    protected $cost = [
        'attribute_code' => 'cost',
        'backend_type' => 'decimal',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'price',
    ];

    protected $created_at = [
        'attribute_code' => 'created_at',
        'backend_type' => 'static',
        'is_required' => '1',
        'default_value' => '',
        'input' => 'text',
    ];

    protected $custom_design = [
        'attribute_code' => 'custom_design',
        'backend_type' => 'varchar',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'select',
    ];

    protected $custom_design_from = [
        'attribute_code' => 'custom_design_from',
        'backend_type' => 'datetime',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'date',
    ];

    protected $custom_design_to = [
        'attribute_code' => 'custom_design_to',
        'backend_type' => 'datetime',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'date',
    ];

    protected $custom_layout_update = [
        'attribute_code' => 'custom_layout_update',
        'backend_type' => 'text',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'textarea',
    ];

    protected $description = [
        'attribute_code' => 'description',
        'backend_type' => 'text',
        'is_required' => '0',
        'default_value' => 'This is description for downloadable product',
        'input' => 'textarea',
        'group' => 'product-details'
    ];

    protected $gallery = [
        'attribute_code' => 'gallery',
        'backend_type' => 'varchar',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'gallery',
    ];

    protected $gift_message_available = [
        'attribute_code' => 'gift_message_available',
        'backend_type' => 'varchar',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'select',
    ];

    protected $group_price = [
        'attribute_code' => 'group_price',
        'backend_type' => 'decimal',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'text',
        'group' => 'advanced-pricing',
        'fixture' => 'Magento\Catalog\Test\Fixture\CatalogProductSimple\GroupPriceOptions'
    ];

    protected $has_options = [
        'attribute_code' => 'has_options',
        'backend_type' => 'static',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'text',
    ];

    protected $image = [
        'attribute_code' => 'image',
        'backend_type' => 'varchar',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'media_image',
    ];

    protected $image_label = [
        'attribute_code' => 'image_label',
        'backend_type' => 'varchar',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'text',
    ];

    protected $is_returnable = [
        'attribute_code' => 'is_returnable',
        'backend_type' => 'varchar',
        'is_required' => '0',
        'default_value' => '2',
        'input' => 'select',
    ];

    protected $links_exist = [
        'attribute_code' => 'links_exist',
        'backend_type' => 'int',
        'is_required' => '0',
        'default_value' => '0',
        'input' => '',
    ];

    protected $links_purchased_separately = [
        'attribute_code' => 'links_purchased_separately',
        'backend_type' => 'int',
        'is_required' => '1',
        'default_value' => '',
        'input' => '',
    ];

    protected $links_title = [
        'attribute_code' => 'links_title',
        'backend_type' => 'varchar',
        'is_required' => '1',
        'default_value' => '',
        'input' => '',
    ];

    protected $media_gallery = [
        'attribute_code' => 'media_gallery',
        'backend_type' => 'varchar',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'gallery',
    ];

    protected $meta_description = [
        'attribute_code' => 'meta_description',
        'backend_type' => 'varchar',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'textarea',
    ];

    protected $meta_keyword = [
        'attribute_code' => 'meta_keyword',
        'backend_type' => 'text',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'textarea',
    ];

    protected $meta_title = [
        'attribute_code' => 'meta_title',
        'backend_type' => 'varchar',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'text',
    ];

    protected $minimal_price = [
        'attribute_code' => 'minimal_price',
        'backend_type' => 'decimal',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'price',
    ];

    protected $msrp = [
        'attribute_code' => 'msrp',
        'backend_type' => 'decimal',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'price',
    ];

    protected $msrp_display_actual_price_type = [
        'attribute_code' => 'msrp_display_actual_price_type',
        'backend_type' => 'varchar',
        'is_required' => '0',
        'default_value' => '4',
        'input' => 'select',
    ];

    protected $msrp_enabled = [
        'attribute_code' => 'msrp_enabled',
        'backend_type' => 'varchar',
        'is_required' => '0',
        'default_value' => '2',
        'input' => 'select',
    ];

    protected $name = [
        'attribute_code' => 'name',
        'backend_type' => 'varchar',
        'is_required' => '1',
        'default_value' => '',
        'input' => 'text',
        'group' => 'product-details',
    ];

    protected $news_from_date = [
        'attribute_code' => 'news_from_date',
        'backend_type' => 'datetime',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'date',
    ];

    protected $news_to_date = [
        'attribute_code' => 'news_to_date',
        'backend_type' => 'datetime',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'date',
    ];

    protected $old_id = [
        'attribute_code' => 'old_id',
        'backend_type' => 'int',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'text',
    ];

    protected $options_container = [
        'attribute_code' => 'options_container',
        'backend_type' => 'varchar',
        'is_required' => '0',
        'default_value' => 'container2',
        'input' => 'select',
    ];

    protected $page_layout = [
        'attribute_code' => 'page_layout',
        'backend_type' => 'varchar',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'select',
    ];

    protected $price = [
        'attribute_code' => 'price',
        'backend_type' => 'decimal',
        'is_required' => '1',
        'default_value' => '',
        'input' => 'price',
        'group' => 'product-details'
    ];

    protected $inventory_manage_stock = [
        'attribute_code' => 'inventory_manage_stock',
        'input' => 'select',
        'group' => 'advanced-inventory',
    ];

    protected $stock_data_min_qty= [
        'attribute_code' => 'stock_data_min_qty',
        'input' => 'text',
        'group' => 'advanced-inventory',
    ];

    protected $stock_data_use_config_min_qty = [
        'attribute_code' => 'stock_data_use_config_min_qty',
        'input' => 'checkbox',
        'group' => 'advanced-inventory'
    ];

    protected $inventory_qty = [
        'attribute_code' => 'inventory_qty',
        'input' => 'text',
        'group' => 'advanced-inventory',
    ];

    protected $quantity_and_stock_status = [
        'attribute_code' => 'quantity_and_stock_status',
        'backend_type' => 'int',
        'is_required' => '0',
        'default_value' => '1',
        'input' => 'select',
        'group' => 'product-details',
    ];

    protected $qty = [
        'attribute_code' => 'qty',
        'backend_type' => 'int',
        'is_required' => '0',
        'default_value' => '1',
        'input' => 'text',
        'group' => 'product-details',
    ];

    protected $related_tgtr_position_behavior = [
        'attribute_code' => 'related_tgtr_position_behavior',
        'backend_type' => 'int',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'text',
    ];

    protected $related_tgtr_position_limit = [
        'attribute_code' => 'related_tgtr_position_limit',
        'backend_type' => 'int',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'text',
    ];

    protected $required_options = [
        'attribute_code' => 'required_options',
        'backend_type' => 'static',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'text',
    ];

    protected $samples_title = [
        'attribute_code' => 'samples_title',
        'backend_type' => 'varchar',
        'is_required' => '1',
        'default_value' => '',
        'input' => '',
    ];

    protected $short_description = [
        'attribute_code' => 'short_description',
        'backend_type' => 'text',
        'is_required' => '0',
        'default_value' => 'This is short description for downloadable product',
        'input' => 'textarea',
        'group' => 'autosettings'
    ];

    protected $downloadable_links = [
        'attribute_code' => 'downloadable_items',
        'backend_type' => 'text',
        'is_required' => '0',
        'default_value' => 'dafault',
        'input' => 'text',
        'group' => 'downloadable_information',
        'fixture' => 'Magento\Downloadable\Test\Fixture\CatalogProductDownloadable\Links'

    ];

    protected $downloadable_sample = [
        'attribute_code' => 'downloadable_sample',
        'backend_type' => 'text',
        'is_required' => '0',
        'default_value' => 'dafault',
        'input' => 'text',
        'group' => 'downloadable_information',
        'fixture' => 'Magento\Downloadable\Test\Fixture\CatalogProductDownloadable\Samples'

    ];

    protected $sku = [
        'attribute_code' => 'sku',
        'backend_type' => 'static',
        'is_required' => '1',
        'default_value' => '',
        'input' => 'text',
        'group' => 'product-details',
    ];

    protected $small_image = [
        'attribute_code' => 'small_image',
        'backend_type' => 'varchar',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'media_image',
    ];

    protected $small_image_label = [
        'attribute_code' => 'small_image_label',
        'backend_type' => 'varchar',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'text',
    ];

    protected $special_from_date = [
        'attribute_code' => 'special_from_date',
        'backend_type' => 'datetime',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'date',
    ];

    protected $special_price = [
        'attribute_code' => 'special_price',
        'backend_type' => 'decimal',
        'is_required' => '0',
        'default_value' => '10',
        'group' => 'advanced-pricing'
    ];

    protected $special_to_date = [
        'attribute_code' => 'special_to_date',
        'backend_type' => 'datetime',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'date',
    ];

    protected $status = [
        'attribute_code' => 'status',
        'backend_type' => 'int',
        'is_required' => '0',
        'default_value' => '1',
        'input' => 'select',
    ];

    protected $tax_class_id = [
        'attribute_code' => 'tax_class_id',
        'backend_type' => 'int',
        'is_required' => '0',
        'default_value' => '2',
        'input' => 'select',
        'group' => 'product-details',
        'source' => 'Magento\Catalog\Test\Fixture\CatalogProductSimple\TaxClass',
    ];

    protected $thumbnail = [
        'attribute_code' => 'thumbnail',
        'backend_type' => 'varchar',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'media_image',
    ];

    protected $thumbnail_label = [
        'attribute_code' => 'thumbnail_label',
        'backend_type' => 'varchar',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'text',
    ];

    protected $tier_price = [
        'attribute_code' => 'tier_price',
        'backend_type' => 'decimal',
        'is_required' => '0',
        'default_value' => 'default',
        'input' => 'text',
        'group' => 'advanced-pricing',
        'fixture' => 'Magento\Catalog\Test\Fixture\CatalogProductSimple\TierPriceOptions'
    ];

    protected $updated_at = [
        'attribute_code' => 'updated_at',
        'backend_type' => 'static',
        'is_required' => '1',
        'default_value' => '',
        'input' => 'text',
    ];

    protected $upsell_tgtr_position_behavior = [
        'attribute_code' => 'upsell_tgtr_position_behavior',
        'backend_type' => 'int',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'text',
    ];

    protected $upsell_tgtr_position_limit = [
        'attribute_code' => 'upsell_tgtr_position_limit',
        'backend_type' => 'int',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'text',
    ];

    protected $url_key = [
        'attribute_code' => 'url_key',
        'backend_type' => 'varchar',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'text',
        'group' => 'autosettings'
    ];

    protected $url_path = [
        'attribute_code' => 'url_path',
        'backend_type' => 'varchar',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'text',
    ];

    protected $visibility = [
        'attribute_code' => 'visibility',
        'backend_type' => 'int',
        'is_required' => '0',
        'default_value' => '4',
        'input' => 'select',
    ];

    protected $weight = [
        'attribute_code' => 'weight',
        'backend_type' => 'decimal',
        'is_required' => '0',
        'default_value' => '',
        'input' => 'weight',
    ];

    protected $custom_options = [
        'attribute_code' => 'custom_options',
        'backend_type' => 'virtual',
        'is_required' => '0',
        'default_value' => 'default',
        'group' => 'customer-options',
        'fixture' => 'Magento\Catalog\Test\Fixture\CatalogProductSimple\CustomOptions',
    ];

    protected $id = [
        'attribute_code' => 'id',
        'backend_type' => 'virtual',
    ];

    public function getCategoryIds()
    {
        return $this->getData('category_ids');
    }

    public function getCost()
    {
        return $this->getData('cost');
    }

    public function getCreatedAt()
    {
        return $this->getData('created_at');
    }

    public function getCustomDesign()
    {
        return $this->getData('custom_design');
    }

    public function getCustomDesignFrom()
    {
        return $this->getData('custom_design_from');
    }

    public function getCustomDesignTo()
    {
        return $this->getData('custom_design_to');
    }

    public function getCustomLayoutUpdate()
    {
        return $this->getData('custom_layout_update');
    }

    public function getDescription()
    {
        return $this->getData('description');
    }

    public function getGallery()
    {
        return $this->getData('gallery');
    }

    public function getGiftMessageAvailable()
    {
        return $this->getData('gift_message_available');
    }

    public function getGroupPrice()
    {
        return $this->getData('group_price');
    }

    public function getHasOptions()
    {
        return $this->getData('has_options');
    }

    public function getImage()
    {
        return $this->getData('image');
    }

    public function getImageLabel()
    {
        return $this->getData('image_label');
    }

    public function getIsReturnable()
    {
        return $this->getData('is_returnable');
    }

    public function getLinksExist()
    {
        return $this->getData('links_exist');
    }

    public function getLinksPurchasedSeparately()
    {
        return $this->getData('links_purchased_separately');
    }

    public function getLinksTitle()
    {
        return $this->getData('links_title');
    }

    public function getMediaGallery()
    {
        return $this->getData('media_gallery');
    }

    public function getMetaDescription()
    {
        return $this->getData('meta_description');
    }

    public function getMetaKeyword()
    {
        return $this->getData('meta_keyword');
    }

    public function getMetaTitle()
    {
        return $this->getData('meta_title');
    }

    public function getMinimalPrice()
    {
        return $this->getData('minimal_price');
    }

    public function getMsrp()
    {
        return $this->getData('msrp');
    }

    public function getMsrpDisplayActualPriceType()
    {
        return $this->getData('msrp_display_actual_price_type');
    }

    public function getMsrpEnabled()
    {
        return $this->getData('msrp_enabled');
    }

    public function getName()
    {
        return $this->getData('name');
    }

    public function getNewsFromDate()
    {
        return $this->getData('news_from_date');
    }

    public function getNewsToDate()
    {
        return $this->getData('news_to_date');
    }

    public function getOldId()
    {
        return $this->getData('old_id');
    }

    public function getOptionsContainer()
    {
        return $this->getData('options_container');
    }

    public function getPageLayout()
    {
        return $this->getData('page_layout');
    }

    public function getPrice()
    {
        return $this->getData('price');
    }

    public function getQuantityAndStockStatus()
    {
        return $this->getData('quantity_and_stock_status');
    }

    public function getRelatedTgtrPositionBehavior()
    {
        return $this->getData('related_tgtr_position_behavior');
    }

    public function getRelatedTgtrPositionLimit()
    {
        return $this->getData('related_tgtr_position_limit');
    }

    public function getRequiredOptions()
    {
        return $this->getData('required_options');
    }

    public function getSamplesTitle()
    {
        return $this->getData('samples_title');
    }

    public function getShortDescription()
    {
        return $this->getData('short_description');
    }

    public function getSku()
    {
        return $this->getData('sku');
    }

    public function getSmallImage()
    {
        return $this->getData('small_image');
    }

    public function getSmallImageLabel()
    {
        return $this->getData('small_image_label');
    }

    public function getSpecialFromDate()
    {
        return $this->getData('special_from_date');
    }

    public function getSpecialPrice()
    {
        return $this->getData('special_price');
    }

    public function getSpecialToDate()
    {
        return $this->getData('special_to_date');
    }

    public function getStatus()
    {
        return $this->getData('status');
    }

    public function getTaxClassId()
    {
        return $this->getData('tax_class_id');
    }

    public function getThumbnail()
    {
        return $this->getData('thumbnail');
    }

    public function getThumbnailLabel()
    {
        return $this->getData('thumbnail_label');
    }

    public function getTierPrice()
    {
        return $this->getData('tier_price');
    }

    public function getUpdatedAt()
    {
        return $this->getData('updated_at');
    }

    public function getUpsellTgtrPositionBehavior()
    {
        return $this->getData('upsell_tgtr_position_behavior');
    }

    public function getUpsellTgtrPositionLimit()
    {
        return $this->getData('upsell_tgtr_position_limit');
    }

    public function getUrlKey()
    {
        return $this->getData('url_key');
    }

    public function getUrlPath()
    {
        return $this->getData('url_path');
    }

    public function getVisibility()
    {
        return $this->getData('visibility');
    }

    public function getWeight()
    {
        return $this->getData('weight');
    }

    public function getId()
    {
        return $this->getData('id');
    }

    public function getCustomOptions()
    {
        return $this->getData('custom_options');
    }
}
