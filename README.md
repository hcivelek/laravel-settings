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


