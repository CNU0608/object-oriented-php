> 01:Composer简介和安装
- 网站：[getcomposer](https://getcomposer.org/ "getcomposer")
- 安装：
    + mac: 
    ```angular2html
          $ curl -sS https://getcomposer.org/installer | php
    ```
    + windows:  下载安装包composer-setup.exe
- mac:
    + 下载会获取到composer.phar这个文件
    + 移动到环境变量目录并改名：mv composer.phar /usr/local/bin/composer
    + 移动到环境变量的目录后，等于注册了全局使用，并且已经更改名字为：composer
    + 那么可以直接再终端使用 composer前缀 后面跟随命令即可
> 02:package引用和版本
- 项目下composer.json的写法, 如何引入包得写法
```angular2html
   {
    "require":{
        "mustache/mustache":"2.9.0"
        // ...
    }
   }
```
- 引入版本时候^号说明
    + 例子：^2.8，那么代表是，2.8 到 3.0，也就是说最大得版本号+1的点0版本，也就是2.8的2+1，.8变成.0
    + 例子：今天实践了下，^号也可以理解成为安装最新版本,下面例子就出现最新版的包了
- 可以直接再package网站进行搜索，并且直接使用包得命令在终端直接下载
```bash
    // 这样就可以下载,下载的是最新版
    
    $ composer require <vendorname>/<name>
    
```
> 03：理解composer的install和update
+ composer.json对应的是composer update
+  composer.lock对应的是composer install，
+  注意：没有lock文件composer就执行json文件

> 04：composer自动加载简单分析
+ 第一步：vendor/autoload.php
```angular2html
    // autoload.php @generated by Composer
    require_once __DIR__ . '/composer/autoload_real.php';
    return ComposerAutoloaderInit23bbeae59271b037728c906bcb04be61::getLoader();
```
+ 第二步：查看`autoload_real.php`，目录：`vendor/composer/autoload_real.php`
    - 通过getLoader方法里的一个foreach进行注册
    ```angular2html
      $map = require __DIR__ . '/autoload_namespaces.php';
      foreach ($map as $namespace => $path) {
          $loader->set($namespace, $path);
      }
    ```
+ 第三步：查看`autoload_namespaces.php`，目录：`vendor/composer/autoload_namespaces.php`
    
    ```angular2html
      // autoload_namespaces.php @generated by Composer
      $vendorDir = dirname(dirname(__FILE__));
      $baseDir = dirname($vendorDir);
      return array(
        'Mustache' => array($vendorDir . '/mustache/mustache/src'),
        //src目录下就按照以上的命名空间来操作
      );
    ```
+ 第四步：查看依赖包目录下得`composer.json`文件，看它通过那个命名空间规范来加载
    - 通过psr-0规范标准
    ```angular2html
      "autoload": {
        "psr-0": { "Mustache": "src/" }
      }
    ```
+ 整条自动加载流程：
    - 引入自动加载文件 autoload.php
    - 自动执行autoload_real.php中得方法getLoader()
    - 方法中调用了autoload_namespaces.php进行返回一个数组，到此自动加载命名空间 基本结束
namespaces文件执行的命名空间标准需要查看依赖包下得composer.json文件

+ 05：使用Packagist 国内镜像
    - 系统全局配置: 即将配置信息添加到 Composer 的全局配置文件 config.json 中。
      修改 composer 的全局配置文件:
      打开命令行窗口(windows用户)或控制台(Linux、Mac 用户)并执行如下命令:
      ```
        $ composer config -g repo.packagist composer https://packagist.phpcomposer.com
      ```
    >单个项目配置: 将配置信息添加到某个项目的 composer.json 文件中。
    修改当前项目的 composer.json 配置文件:
    打开命令行窗口(windows用户)或控制台(Linux、Mac 用户)，进入你的项目的根目录(也就是 composer.json 文件所在目录)，执行如下命令:
    ```
        $ composer config repo.packagist composer https://packagist.phpcomposer.com
    
    ```
    + 上述命令将会在当前项目中的 composer.json 文件的末尾自动添加镜像的配置信息(也可以自己手工添加):
    ```
        
        "repositories": {
            "packagist": {
                "type": "composer", 
                "url": "https://packagist.phpcomposer.com" 
            }
        }
    
    ```
+ 06：使用composer创建项目

    - 常见命令 ：composer create-project
    - composer创建项目终端命令：composer create-project <原始名字>/<默认名字> <别名> <版本号>
    
    + 项目运行
    ```
        // 1. 自定义
        $ php -S localhost:8888 -t public
        
        // php默认
        $ php artisan serve
    ```
