<?php
declare(strict_types=1);

/**
 * Pimcore
 *
 * This source file is available under following license:
 * - GNU General Public License version 3 (GPLv3)
 *
 *  @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 *  @license    http://www.pimcore.org/license     GPLv3
 */

namespace Pimcore\Bundle\xTemplateBundlex;

use Pimcore\Bundle\EnterpriseSubscriptionToolsBundle\Bundle\EnterpriseBundleInterface;
use Pimcore\Bundle\EnterpriseSubscriptionToolsBundle\PimcoreEnterpriseSubscriptionToolsBundle;
use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Pimcore\Extension\Bundle\Installer\InstallerInterface;
use Pimcore\HttpKernel\BundleCollection\BundleCollection;

class PimcorexTemplateBundlex extends AbstractPimcoreBundle implements
    EnterpriseBundleInterface
{
    private const ENTERPRISE_BUNDLE_LICENSE_ID = 'xLicensex';

    public function getPath(): string
    {
        return dirname(__DIR__);
    }

    public function getJsPaths(): array
    {
        return [];
    }

    public function getCssPaths(): array
    {
        return [];
    }

    public function getInstaller(): ?InstallerInterface
    {
        parent::getInstaller();

        /** @var InstallerInterface|null */
        return $this->container->get(Installer::class);
    }

    public static function registerDependentBundles(BundleCollection $collection): void
    {
        $collection->addBundle(new PimcoreEnterpriseSubscriptionToolsBundle());
    }

    public function getBundleLicenseId(): string
    {
        return self::ENTERPRISE_BUNDLE_LICENSE_ID;
    }
}
