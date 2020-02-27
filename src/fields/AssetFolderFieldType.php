<?php
/**
 * Asset Folder Field plugin for Craft CMS 3.x
 *
 * @link      https://rw.is
 * @copyright Copyright (c) 2020 Ryan Whitney
 */

namespace ryanwhitney\assetfolderfield\fields;

use Craft;
use craft\base\ElementInterface;
use craft\base\Field;
use craft\base\PreviewableFieldInterface;
use craft\fields\PlainText;

/**
 * Asset Folder Field type
 *
 * @author    Ryan Whitney
 * @package   AssetFolderField
 * @since     1.0.0
 *
 */
class AssetFolderFieldType extends PlainText implements PreviewableFieldInterface
{
    // Properties
    // =========================================================================

    public $mode = 'plain';
    public $modeOverride;

    private $_modes;

    // Static Methods
    // =========================================================================

    /**
     * Returns the display name of this class.
     *
     * @return string The display name of this class.
     */
    public static function displayName(): string
    {
        return Craft::t('asset-folder-field', 'Asset Folder');
    }

    // Public Methods
    // =========================================================================

 

    /**
     * @return string
     */
    public function getSettingsHtml()
    {
        // Render the settings template
        return Craft::$app->getView()->renderTemplate(
            'asset-folder-field/_components/fields/_settings',
            [
                'field' => $this,
            ]
        );
    }


    /**
     * @param mixed $value
     * @param ElementInterface|null $element
     *
     * @return string
     */
    public function getInputHtml($value, ElementInterface $element = null): string
    {
        $allFileModels = \craft\records\VolumeFolder::find()->all();
        $string = '<div class="select"><select name="' . $this->handle .  '">';
        /** @var VolumeFolder $folder */
        foreach ($allFileModels as $folder){
            $selected = ((int)$value === $folder->id)? 'selected="selected' : '';
            $string .= '<option ' . $selected .  ' value="' . $folder->id . '">' . $folder->name .  '</option>';
        }
        $string .= '</select></div>';

        return $string;
        
    }

    // Private Methods
    // =========================================================================

    /**
     * @param ElementInterface|null $element
     * @return string
     * @throws \yii\base\Exception
     */
}
