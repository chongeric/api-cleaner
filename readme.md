

## 项目介绍


## 代码规范

1、遵循psr代码风格进行代码编写  
2、数据库更改使用 `migration`  
3、必须有填充的数据使用 `seed` 并写入到 `DatabaseSeeder` 里面

## 切记 ，千万不能在程序中执行
```shell
    php artisan cache:clear
```
## 这条命令会删除所有的redis存储的数据，小心系统完蛋啊

#######  关于php兼容app版本代码多套代码共存问题

```php
//第一期路由
Route::get('/test', 'TestController@test');
//第二期路由 如果两期业务逻辑和bug一样可，修改后不影响第一期的业务逻辑，则修改test方法
Route::get('/v2/test', 'TestController@test');
//如果第二期的test的业务逻辑与第一期又区别，影响了第一期的正常运行，则在test方法下面新建V2_test()方法
Route::get('/v2/test', 'TestController@V2_test');
```

# wechat
依赖 composer

在 laravel 处 创建一个 packages 文件夹

将 laravel 下的 composer.json 处的

"autoload": {
    "classmap": [
        "database/seeds",
        "database/factories"
    ],
    "psr-4": {
        "App\\": "app/",
        "QingYun\\":"packages/"
    }
}

使用 composer dump-autoload 装载

在项目目录下 config 文件夹中 app.php 的 providers 数组指引加入如下代码实例化类：

QingYun\CleanerProvider::class,

接下来通过将数据表加入数据库（数据库必须先定义 由 .evn 配置得来 ）

每次更新需在 laravel 项目使用 php artisan vendor:publish --force 命令 该命令会将 packages/ 下的项目注册进入发布 

. 代码一定的要做到，简洁优雅，而Facades 好处就是让代码更加简洁，优雅，这也是Laravel追求的特性
