<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractYvesControllerProvider;
use Silex\Application;

class CheckoutControllerProvider extends AbstractYvesControllerProvider
{
    public const CHECKOUT_CUSTOMER = 'checkout-customer';
    public const CHECKOUT_ADDRESS = 'checkout-address';
    public const CHECKOUT_SHIPMENT = 'checkout-shipment';
    public const CHECKOUT_PAYMENT = 'checkout-payment';
    public const CHECKOUT_SUMMARY = 'checkout-summary';
    public const CHECKOUT_PLACE_ORDER = 'checkout-place-order';
    public const CHECKOUT_ERROR = 'checkout-error';
    public const CHECKOUT_SUCCESS = 'checkout-success';
    public const CHECKOUT_INDEX = 'checkout-index';
    public const CHECKOUT_VOUCHER_ADD = 'checkout-voucher-add';

    public const CHECKOUT_OFFER_INDEX = 'checkout-offer-index';
    public const CHECKOUT_OFFER_ADDRESS = 'checkout-offer-address';
    public const CHECKOUT_OFFER_SHIPMENT = 'checkout-offer-shipment';
    public const CHECKOUT_OFFER_PAYMENT = 'checkout-offer-payment';
    public const CHECKOUT_OFFER_SUMMARY = 'checkout-offer-summary';
    public const CHECKOUT_PLACE_OFFER = 'checkout-place-offer';
    public const CHECKOUT_OFFER_SUCCESS = 'checkout-offer-success';
    public const CHECKOUT_OFFER_CUSTOMER = 'checkout-offer-customer';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $allowedLocalesPattern = $this->getAllowedLocalesPattern();

        $this->createController('/{checkout}', self::CHECKOUT_INDEX, 'Checkout', 'Checkout', 'index')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/customer', self::CHECKOUT_CUSTOMER, 'Checkout', 'Checkout', 'customer')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/address', self::CHECKOUT_ADDRESS, 'Checkout', 'Checkout', 'address')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/shipment', self::CHECKOUT_SHIPMENT, 'Checkout', 'Checkout', 'shipment')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/payment', self::CHECKOUT_PAYMENT, 'Checkout', 'Checkout', 'payment')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/summary', self::CHECKOUT_SUMMARY, 'Checkout', 'Checkout', 'summary')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/place-order', self::CHECKOUT_PLACE_ORDER, 'Checkout', 'Checkout', 'placeOrder')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/error', self::CHECKOUT_ERROR, 'Checkout', 'Checkout', 'error')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/success', self::CHECKOUT_SUCCESS, 'Checkout', 'Checkout', 'success')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/add-voucher', self::CHECKOUT_VOUCHER_ADD, 'Checkout', 'Checkout', 'addVoucher')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/offer', self::CHECKOUT_OFFER_INDEX, 'Checkout', 'OfferCheckout', 'index')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/offer/customer', self::CHECKOUT_OFFER_CUSTOMER, 'Checkout', 'OfferCheckout', 'customer')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/offer/place-offer', self::CHECKOUT_PLACE_OFFER, 'Checkout', 'OfferCheckout', 'placeOrder')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/offer/success', self::CHECKOUT_OFFER_SUCCESS, 'Checkout', 'OfferCheckout', 'success')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/offer/address', self::CHECKOUT_OFFER_ADDRESS, 'Checkout', 'OfferCheckout', 'address')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/offer/shipment', self::CHECKOUT_OFFER_SHIPMENT, 'Checkout', 'OfferCheckout', 'shipment')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/offer/payment', self::CHECKOUT_OFFER_PAYMENT, 'Checkout', 'OfferCheckout', 'payment')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/offer/summary', self::CHECKOUT_OFFER_SUMMARY, 'Checkout', 'OfferCheckout', 'summary')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');
    }
}
