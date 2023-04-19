<?php
/**
 * This code is licensed under AGPLv3 license or AfterLogic Software License
 * if commercial version of the product was purchased.
 * For full statements of the licenses see LICENSE-AFTERLOGIC and LICENSE-AGPL3 files.
 */

namespace Aurora\Modules\S3CorporateFilestorage;

use Aurora\Modules\CorporateFiles\Module as CorporateFiles;

/**
 * @license https://www.gnu.org/licenses/agpl-3.0.html AGPL-3.0
 * @license https://afterlogic.com/products/common-licensing AfterLogic Software License
 * @copyright Copyright (c) 2023, Afterlogic Corp.
 *
 * @package Modules
 */
class Module extends \Aurora\Modules\S3Filestorage\Module
{
    protected $aRequireModules = ['CorporateFiles', 'S3Filestorage'];

    protected static $sStorageType = 'corporate';
    protected static $iStorageOrder = 20;

    public function init()
    {
        $corporateFiles = CorporateFiles::getInstance();
        if ($corporateFiles && !$this->getConfig('Disabled', false)) {
            $corporateFiles->setConfig('Disabled', true);
        }

        parent::init();
    }

    /**
     *
     * @return Module
     */
    public static function Decorator()
    {
        return parent::Decorator();
    }

    /**
     *
     * @return Settings
     */
    public function getModuleSettings()
    {
        return $this->oModuleSettings;
    }
}
