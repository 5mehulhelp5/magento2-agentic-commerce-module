# Agentic Commerce for Magento 2 (ACP Feed, Payments and Checkout)

This module makes your store compatible with AI-powered shopping experiences like OpenAI's "Instant Checkout" in ChatGPT.

This is the first Open-Source module that enables Agentic Commerce features in Magento 2 / Adobe Commerce stores (such as Shop in ChatGPT). The module is Hyva and Adobe Commerce Cloud compatible.

[Agentic Commerce Protocol (ACP)](https://www.agenticcommerce.dev/) is an open standard that enables a conversation between buyers, their AI agents, and businesses to complete a purchase.

**This module is currently actively under development by Magebit and is open to public contributions.**

## Features

- [x] ChatGPT Compatible Product Feed Export
- [x] Instant Checkout Ready
- [x] Agentic Checkout Configuration (according to ACP)
- [ ] Agentic Checkout webhooks
- [x] Delegated Payment Support

## Requirements

- PHP >= 8.1
- Stripe Payments (only if using checkout)

## Installation

### As a composer package

**Will be released soon**

### As a module

1. Download latest release files and extract them under `app/code/Magebit/AgenticCommerce`
2. Run `bin/magento setup:upgrade`

## Configuration

You can find the Module's configuration under `Stores -> Settings -> Configuration -> Magebit -> Agentic Commerce`:
Make sure to configure Product Feed settings before running an export.

<img width="1486" height="864" alt="image" src="https://github.com/user-attachments/assets/14ae49c3-33be-45e0-b539-89856997f557" />


Additionally, there are settings at the product level. Here you can configure product visibility in Agentic search and whether to allow
Agentic Checkout.

<img width="1799" height="320" alt="image" src="https://github.com/user-attachments/assets/5cc8b68f-5ec2-40a4-b0ca-fd806ef38b2d" />


## ACP Ready Product Feed

To export the product feed, use the `magebit:agentic-commerce:export` Magento command:

```
Usage:
  magebit:agentic-commerce:export [options]

Options:
  -s, --store=STORE     Store ID to export products from [default: 1]
  -o, --output=OUTPUT   Output file path. Relative to var directory [default: "export/agentic_commerce.csv"]
```

## Configuring Feed Mapping

Exported product attributes are mapped using the `ac_product_feed_mapping.xml` config file. To adjust the mapping,
create a new `ac_product_feed_mapping.xml` config file and add or overwrite existing mappings.

```xml
<mapping id="id">
    <source_attribute>sku</source_attribute>
    <target_attribute xsi:type="const">Magebit\AgenticCommerce\Api\Data\Spec\ProductInterface::ID</target_attribute>
</mapping>
```

- `id` is a unique identifier for the mapping
    - `source_attribute` is the Magento 2 product attribute
    - `target_attribute` is the attribute code that will be used in the feed
    - `formatter` (optional) is a Magento 2 class that formats the attribute value

Source Attribute value can be a `string` or an `object`:

```xml
<mapping id="link">
    <source_attribute xsi:type="object">Magebit\AgenticCommerce\Model\Mapping\Source\Url</source_attribute>
    <target_attribute xsi:type="const">Magebit\AgenticCommerce\Api\Data\Spec\ProductInterface::LINK</target_attribute>
</mapping>
```

Source classes must implement the `Magebit\AgenticCommerce\Api\Mapping\SourceInterface` interface.

Check out the default `ac_product_feed_mapping.xml` config for a full reference.

## Delegated Payments

By default, this module does not store any payment data as the implementation logic will be different depending on what PSP is used by the merchant. To enable delegated payments, it's required to implement a
class that implements `Magebit\AgenticCommerce\Api\PaymentMethodVaultHandlerInterface` and handles the storage of the
payment method data. Payment Method Vault handler will receive `DelegatePaymentRequestInterface` object and must return a vault token.

An example for an imaginary FooBar payment service provider:
```php
<?php

namespace My\Module\AgenticCommerce\Model;

use Magebit\AgenticCommerce\Api\PaymentMethodVaultHandlerInterface;
use Magebit\AgenticCommerce\Api\Data\Request\DelegatePaymentRequestInterface;

class FooBarPaymentVaultHandler implements DelegatePaymentRequestInterface
{
    /**
     * @param DelegatePaymentRequestInterface $request 
     * @return bool 
     */
    public function canStore(DelegatePaymentRequestInterface $request): bool
    {
        return $request->getPaymentMethod()->getType() === 'card';
    }

    /**
     * @param DelegatePaymentRequestInterface $request 
     * @return string 
     */
    public function handle(DelegatePaymentRequestInterface $request): string
    {
        $fooBarVaultToken = $this->fooBarPaymentsApi->createPaymentMethod([
            'type' => 'card',
            'number' => $request->getPaymentMethod()->getNumber(),
            'expMonth' => $request->getPaymentMethod()->getExpMonth(),
            'expYear' => $request->getPaymentMethod()->getExpYear(),
            'cvc' => $request->getPaymentMethod()->getCvc(),
        ]);

        return $fooBarVaultToken->id;
    }
}
```

Vault handler class must be registered in di.xml:

```xml
<type name="Magebit\AgenticCommerce\Service\DelegatePaymentService">
    <arguments>
        <argument name="paymentMethodVaultHandlers" xsi:type="array">
            <item name="foo_bar" xsi:type="object">My\Module\AgenticCommerce\Model\FooBarPaymentVaultHandler</item>
        </argument>
    </arguments>
</type>
```

### Handling place order requests

See: `Magebit\AgenticCommerce\Model\Payment\StripePaymentsHandler`

## Contributing

Found a bug, have a feature suggestion or just want to help in general? Contributions are very welcome! Check out the list of active issues or submit one yourself.

## Implementation as a Service

Interested in [Magebit](https://magebit.com) doing the integration for you? Contact us on our [website](https://magebit.com/contact) and we can help you with the full implementation of Agentic Commerce sales channels (Instant Checkout on ChatGPT, Product Feeds, etc).

---
![magebit (1)](https://github.com/user-attachments/assets/cdc904ce-e839-40a0-a86f-792f7ab7961f)

*Have questions or need help? Contact us at info@magebit.com*
