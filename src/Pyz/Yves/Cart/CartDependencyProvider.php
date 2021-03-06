<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Cart;

use Pyz\Yves\Checkout\Plugin\CheckoutBreadcrumbPlugin;
use Pyz\Yves\Discount\Handler\VoucherCodeHandler;
use Pyz\Yves\GiftCard\Cart\Plugin\GiftCardCodeHandler;
use Pyz\Yves\Product\Plugin\StorageProductMapperPlugin;
use Spryker\Yves\CartVariant\Dependency\Plugin\CartVariantAttributeMapperPlugin;
use Spryker\Yves\DiscountPromotion\Plugin\ProductPromotionMapperPlugin;
use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;
use Spryker\Yves\Kernel\Plugin\Pimple;

class CartDependencyProvider extends AbstractBundleDependencyProvider
{
    public const CLIENT_CALCULATION = 'calculation client';
    public const CLIENT_CART = 'cart client';
    public const CLIENT_AVAILABILITY = 'CLIENT_AVAILABILITY';
    public const CLIENT_PRODUCT = 'CLIENT_PRODUCT';

    public const PLUGIN_APPLICATION = 'application plugin';
    public const PLUGIN_CHECKOUT_BREADCRUMB = 'PLUGIN_CHECKOUT_BREADCRUMB';
    public const PLUGIN_CART_VARIANT = 'PLUGIN_CART_VARIANT';
    public const PLUGIN_STORAGE_PRODUCT_MAPPER = 'PLUGIN_STORAGE_PRODUCT_MAPPER';
    public const PLUGIN_PROMOTION_PRODUCT_MAPPER = 'PLUGIN_PROMOTION_PRODUCT_MAPPER';
    public const CODE_HANDLER_PLUGINS = 'CODE_HANDLER_PLUGINS';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container = $this->provideClients($container);
        $container = $this->providePlugins($container);

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function provideClients(Container $container)
    {
        $container[self::CLIENT_CALCULATION] = function (Container $container) {
            return $container->getLocator()->calculation()->client();
        };

        $container[self::CLIENT_CART] = function (Container $container) {
            return $container->getLocator()->cart()->client();
        };

        $container[static::CLIENT_PRODUCT] = function (Container $container) {
            return $container->getLocator()->product()->client();
        };

        $container[static::CLIENT_AVAILABILITY] = function (Container $container) {
            return $container->getLocator()->availability()->client();
        };

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function providePlugins(Container $container)
    {
        $container[self::PLUGIN_APPLICATION] = function () {
            $pimplePlugin = new Pimple();

            return $pimplePlugin->getApplication();
        };

        $container[self::PLUGIN_CART_VARIANT] = function () {
            return new CartVariantAttributeMapperPlugin();
        };

        $container[self::PLUGIN_CHECKOUT_BREADCRUMB] = function () {
            return new CheckoutBreadcrumbPlugin();
        };

        $container[self::PLUGIN_STORAGE_PRODUCT_MAPPER] = function () {
            return new StorageProductMapperPlugin();
        };

        $container[self::PLUGIN_PROMOTION_PRODUCT_MAPPER] = function () {
            return new ProductPromotionMapperPlugin();
        };

        $container[self::CODE_HANDLER_PLUGINS] = function () {
            return [
                new VoucherCodeHandler(),
                new GiftCardCodeHandler(),
            ];
        };

        return $container;
    }
}
