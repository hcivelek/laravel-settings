[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]

# Laravel Settings
It provides a settings model that can be used with trait on any model for Laravel project

# Usage
This package provides the **hasSettings** trait that can be included any model. After that the functions below can be used:

````
settings()
addSetting($keyword, $value)
addSettings($settings)
removeSetting($keyword)
removeSettings($keywords)
syncSettings($settings)
valueofSetting($keyword)
valueOfSettingAsArray($keyword)
````



[ico-version]: https://img.shields.io/packagist/v/hcivelek/settings.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/hcivelek/settings.svg?style=flat-square


[link-packagist]: https://packagist.org/packages/hcivelek/laravel-settings
[link-downloads]: https://packagist.org/packages/hcivelek/laravel-settings
[link-author]: https://github.com/hcivelek 