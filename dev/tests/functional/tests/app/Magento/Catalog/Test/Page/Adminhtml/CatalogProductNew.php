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

namespace Magento\Catalog\Test\Page\Adminhtml;

use Mtf\Page\BackendPage;
use Mtf\Fixture\FixtureInterface;

/**
 * Class CatalogProductNew
 */
class CatalogProductNew extends BackendPage
{
    const MCA = 'catalog/product/new';

    protected $_blocks = [
        'form' => [
            'name' => 'form',
            'class' => 'Magento\Catalog\Test\Block\Adminhtml\Product\ProductForm',
            'locator' => '[id="page:main-container"]',
            'strategy' => 'css selector',
        ],
        'productForm' => [
            'name' => 'productForm',
            'class' => 'Magento\Catalog\Test\Block\Backend\ProductForm',
            'locator' => '[id="page:main-container"]',
            'strategy' => 'css selector',
        ],
        'configurableProductForm' => [
            'name' => 'configurableProductForm',
            'class' => 'Magento\ConfigurableProduct\Test\Block\Adminhtml\Product\ProductForm',
            'locator' => 'body',
            'strategy' => 'css selector',
        ],
        'formAction' => [
            'name' => 'formAction',
            'class' => 'Magento\Catalog\Test\Block\Adminhtml\Product\FormPageActions',
            'locator' => '.page-main-actions',
            'strategy' => 'css selector',
        ],
        'affectedAttributeSetForm' => [
            'name' => 'affectedAttributeSetForm',
            'class' => 'Magento\Catalog\Test\Block\Adminhtml\Product\AffectedAttributeSetForm',
            'locator' => '#affected-attribute-set-form',
            'strategy' => 'css selector',
        ],
        'messagesBlock' => [
            'name' => 'messagesBlock',
            'class' => 'Magento\Core\Test\Block\Messages',
            'locator' => '#messages .messages',
            'strategy' => 'css selector',
        ],
    ];

    /**
     * Custom constructor
     */
    protected function _init()
    {
        $this->_url = $_ENV['app_backend_url'] . static::MCA;
    }

    /**
     * Page initialization
     *
     * @param FixtureInterface $fixture
     * @return void
     */
    public function init(FixtureInterface $fixture)
    {
        $dataConfig = $fixture->getDataConfig();

        $params = isset($dataConfig['create_url_params']) ? $dataConfig['create_url_params'] : array();
        foreach ($params as $paramName => $paramValue) {
            $this->_url .= '/' . $paramName . '/' . $paramValue;
        }
    }

    /**
     * @return \Magento\Catalog\Test\Block\Backend\ProductForm
     */
    public function getProductForm()
    {
        return $this->getBlockInstance('productForm');
    }

    /**
     * @return \Magento\Catalog\Test\Block\Adminhtml\Product\ProductForm
     */
    public function getForm()
    {
        return $this->getBlockInstance('form');
    }

    /**
     * @return \Magento\ConfigurableProduct\Test\Block\Adminhtml\Product\ProductForm
     */
    public function getConfigurableProductForm()
    {
        return $this->getBlockInstance('configurableProductForm');
    }

    /**
     * @return \Magento\Catalog\Test\Block\Adminhtml\Product\FormPageActions
     */
    public function getFormAction()
    {
        return $this->getBlockInstance('formAction');
    }

    /**
     * @return \Magento\Catalog\Test\Block\Adminhtml\Product\AffectedAttributeSetForm
     */
    public function getAffectedAttributeSetForm()
    {
        return $this->getBlockInstance('affectedAttributeSetForm');
    }

    /**
     * @return \Magento\Core\Test\Block\Messages
     */
    public function getMessagesBlock()
    {
        return $this->getBlockInstance('messagesBlock');
    }

    /**
     * Switch back to main page from iframe
     */
    public function switchToMainPage()
    {
        $this->_browser->switchToFrame();
    }
}
