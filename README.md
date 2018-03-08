# Magento 2 best sellers products extension
This extension allows you to create widget of best sellers products in your Magento 2 store.

## Getting started
The following instructions describe installation and configuration aspects of extension.

### Prerequisites
Magento Open Source 2.x installed

### Getting the extension
- Using `Composer`

    If `Composer` is installed on your server add in command line the following command:

    `composer require zshapetech/module-best-sellers`

- Simply download repository as `.zip` file or clone with the following command:
    
    `git clone https://github.com/zshapetech/module-best-sellers.git`
    
    Create directory `app/code/ZShapeTech/BestSellers` in Magento 2 installation and copy downloaded files.
    
    Install [zshapetech/module-core](https://github.com/zshapetech/module-core)
    
### Installing
Run in command line the following commands:

  * `php bin/magento setup:upgrade`
  
  * `php bin/magento setup:di:compile`

### Configurating
To add best sellers widget open Magento 2 admin and navigate to **Content > Widgets**. Click **Add widget**, choose type
**Best Sellers Products** and prefered design theme. Next at **Widget Options** section you can set up how best sellers widget should appear on frontend.

Navigate to section **ZshapeTech > Settings**. Here you can change best sellers settings.


## License
This magento 2 extension is licensed under the MIT license.
