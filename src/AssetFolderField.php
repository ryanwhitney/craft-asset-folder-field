<?php
/**
 * Asset Folder Field plugin for Craft CMS 3.x
 * ___________________   _________   ___ ________   __________   ___  
 * |__|[__ [__ |___ |    |___|  ||   |  \|___|__/   |___||___|   |  \ 
 * |  |___]___]|___ |    |   |__||___|__/|___|  \   |   ||___|___|__/ 
 *                                                                  
 * A dropdown field that lets you select an asset folder.
 *
 * @link      http://rw.is
 * @copyright Copyright (c) 2020 Ryan Whitney
 */

namespace ryanwhitney\assetfolderfield;

use ryanwhitney\assetfolderfield\fields\AssetFolderFieldType;

use Craft;
use craft\base\Plugin;
use craft\services\Fields;
use craft\events\RegisterComponentTypesEvent;

use yii\base\Event;

/**
 * Class AssetFolderField
 *
 * @author    Ryan Whitney
 * @package   AssetFolderField
 * @since     1.0.0
 *
 */
class AssetFolderField extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var AssetFolderField
     */
    public static $plugin;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        // Register our fields
        Event::on(
        	Fields::class, 
        	Fields::EVENT_REGISTER_FIELD_TYPES,
            function(RegisterComponentTypesEvent $event) {
                $event->types[] = AssetFolderFieldType::class;
            }
        );

        Craft::info(
            Craft::t(
                'asset-folder-field',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

}
