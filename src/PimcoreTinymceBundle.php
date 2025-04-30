<?php
declare(strict_types=1);

/**
 * This source file is available under the terms of the
 * Pimcore Open Core License (POCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (https://www.pimcore.com)
 *  @license    Pimcore Open Core License (POCL)
 */

namespace Pimcore\Bundle\TinymceBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Pimcore\Extension\Bundle\PimcoreBundleAdminClassicInterface;
use Pimcore\Extension\Bundle\Traits\BundleAdminClassicTrait;
use Pimcore\Extension\Bundle\Traits\PackageVersionTrait;
use Pimcore\Helper\EncoreHelper;

class PimcoreTinymceBundle extends AbstractPimcoreBundle implements PimcoreBundleAdminClassicInterface
{
    use BundleAdminClassicTrait;
    use PackageVersionTrait;

    public function getCssPaths(): array
    {
        return [
            '/bundles/pimcoretinymce/css/editor.css',
        ];
    }

    public function getEditmodeCssPaths(): array
    {
        return [
            '/bundles/pimcoretinymce/css/editor.css',
        ];
    }

    public function getJsPaths(): array
    {
        return $this->getAllJsPaths();
    }

    public function getEditmodeJsPaths(): array
    {
        return $this->getAllJsPaths();
    }

    public function getInstaller(): Installer
    {
        return $this->container->get(Installer::class);
    }

    public function getPath(): string
    {
        return dirname(__DIR__);
    }

    private function getAllJsPaths(): array
    {
        $paths = EncoreHelper::getBuildPathsFromEntrypoints($this->getPath() . '/public/build/tinymce/entrypoints.json');
        $paths[]= '/bundles/pimcoretinymce/js/editor.js';

        return $paths;
    }
}
