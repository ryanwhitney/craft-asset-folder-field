![Plugin Icon: A folder with a dropdown arrow on a blue background.](./src/icon.svg) 

# Asset Folder Field plugin for Craft CMS 3.x

A dropdown field that lets you select from folders in the Assets section of a Craft CMS site.

## Requirements

This plugin requires Craft CMS 3.0.0-RC1 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require ryanwhitney/asset-folder-field

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Asset Folder Field.

## Asset Folder Field Overview

Asset Folder Field adds a custom FieldType to Craft CMS called Asset Folder. This lets you choose from any folder found in the Assets section, which then returns a folderId. 

This plugin is pretty basic, but gets the job done. Pull requests are very welcome.

## Templating

The folderId output by the Asset Folder field can then be used to work with assets and asset folders in your templates.

#### Get Folder Name:
```twig
{# Assign the output folderId to a variable #}
{% set selectedFolderId = entry.<YourAssetFolderFieldHandle> %}

{# Find the first image in the folder as an anchor to be able to call the folder name from. #}
{% set firstImageInFolder = craft.assets.folderId(selectedFolderId).one() %}

{# Make sure that isn't null, in case the folder is empty. #}
{% if firstImageInFolder is not null %}
	{{ firstImageInFolder.folder }}
{% endif %} 
 ```
 #### Loop Through Images From Folder:
 ```twig
{% set selectedFolderId = entry.<YourAssetFolderFieldHandle> %}
{% set assets = craft.assets.folderId(selectedFolderId).all() %}
{% for image in assets %}
    <h2>{{ image.title }}</h2>
        <img src="{{ image.url }}" alt="{{ image.title }}" />
{% endfor %}
```

## Disclaimer

This plugin is distributed free of charge under the MIT License. The author is not responsible for any data loss or issues resulting from use of the plugin. 

## Special Thanks 

This plugin was made with the help of assets and code found within the CraftCMS community. These folks are **not** affiliated with this plugin in any way, though I greatly appreciate their contributions to the community! 

Thanks to [@mmikkel](https://github.com/mmikkel/IncognitoField-Craft3), whose [IncognitoField](https://github.com/mmikkel/IncognitoField-Craft3) plugin was heavily referenced and used as a general framework when using this plugin. 🎉

Thanks to [@anubarak](https://github.com/Anubarak), whose [StackExchange answer](https://craftcms.stackexchange.com/a/24011) provided the basis for the folder finding logic. 🎉

And thanks to [@landon](https://thenounproject.com/landan), whose [folder icon](https://thenounproject.com/search/?q=folder&i=1594035) was used in the logo. 🎉
