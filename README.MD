# Magento 2 OPcache GUI
An admin GUI for monitoring OPCache performance and resetting the cache.  This extension adds a link in the admin panel at System > Tools > OPcache Managent.  Optional link can be activated for quick reset and cached scripts can also be viewed in a list format, see Settings > TCMP > OPcache to enable either.

## Installation
- composer require tcmp/opcache
- php bin/magento module:enable TCMP_OpCache
- php bin/magento setup:updgrade
- php bin/magento setup:static-content:deploy

## Basis + Inspiration:
- https://github.com/SchumacherFM/Magento-OpCache/
- https://github.com/amnuts/opcache-gui

## @TODO
- Realtime Updates
- Per file cache invalidation
    - table filtering
- Handle rendering getScripts more efficiently
- Add get_extension_funcs('Zend OPcache')
    - what other data points would be useful?