<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Tests\Sylius\InvoicingPlugin\Behat\Page\Shop\Order;

use FriendsOfBehat\PageObjectExtension\Page\SymfonyPage;

final class DownloadInvoicePage extends SymfonyPage implements DownloadInvoicePageInterface
{
    public function getRouteName(): string
    {
        return 'sylius_invoicing_plugin_shop_invoice_download';
    }
}
