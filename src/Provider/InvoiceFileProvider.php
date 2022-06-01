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

namespace Sylius\InvoicingPlugin\Provider;

use Gaufrette\Exception\FileNotFound;
use Gaufrette\FilesystemInterface;
use Sylius\InvoicingPlugin\Entity\InvoiceInterface;
use Sylius\InvoicingPlugin\Generator\InvoiceFileNameGeneratorInterface;
use Sylius\InvoicingPlugin\Generator\InvoicePdfFileGeneratorInterface;
use Sylius\InvoicingPlugin\Manager\InvoiceFileManagerInterface;
use Sylius\InvoicingPlugin\Model\InvoicePdf;

final class InvoiceFileProvider implements InvoiceFileProviderInterface
{
    public function __construct(private InvoiceFileNameGeneratorInterface $invoiceFileNameGenerator, private FilesystemInterface $filesystem, private InvoicePdfFileGeneratorInterface $invoicePdfFileGenerator, private InvoiceFileManagerInterface $invoiceFileManager, private string $invoicesDirectory)
    {
    }

    public function provide(InvoiceInterface $invoice): InvoicePdf
    {
        $invoiceFileName = $this->invoiceFileNameGenerator->generateForPdf($invoice);

        try {
            $invoiceFile = $this->filesystem->get($invoiceFileName);
            $invoicePdf = new InvoicePdf($invoiceFileName, $invoiceFile->getContent());
        } catch (FileNotFound) {
            $invoicePdf = $this->invoicePdfFileGenerator->generate($invoice);
            $this->invoiceFileManager->save($invoicePdf);
        }

        $invoicePdf->setFullPath($this->invoicesDirectory . '/' . $invoiceFileName);

        return $invoicePdf;
    }
}
