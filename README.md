# PE2022_Team 4

## Members
 - Vo Khanh Minh (16035) (Team leader)
 - Trần Gia Long (16276)
 - Nguyễn Thái Minh (15643)
 - Trần Phương Hải Đăng (15910)
 - Trương Phước Thịnh (15812)
 - Trần Đăng Tư (16664)
 - Nguyễn Xuân Minh (16029)
 - Trần Lý Đăng Khoa (16685)
 - Truong Nguyen Thien An (16772)

## Project: Online Library Management

Develop an online library management application where users can rent books for a specific time, like them and can also review books. This will have two interfaces:

    - User interface
    - Admin interface

* Users registered for this application can:
    - Browse books from the library
    - Filter them based on category, author, publication, etc.
    - Pay and rent them for a specific duration
    - Like/Review them
* Admin of this application can
    - List and manage books
    - Track rented books and their availability
    - Send notifications via email to users once lease expires

To run the application. Laravel/spatie must first be installed. If you have not installed Laravel/spatie, follow [this guide](https://spatie.be/docs/laravel-permission/v5/installation-laravel).

The application assumes that the default asset URL host is **<APP\_URL>/assets**. To set default asset URL host, in your **.env** file, set the **ASSET\_URL** variable to **<APP\_URL>/assets**, where **<APP\_URL>** is the value of **APP\_URL** variable.

You may need to run these Artisan commands in order to properly run the application:

*   `composer dump-autoload` Artisan command to load global helper functions.
*   `php artisan storage:link` Artisan command to create the symbolic link. You can read more about symbolic link [here](https://laravel.com/docs/9.x/filesystem#the-public-disk).

**Note:** you must config your own mail related settings in your **.env** file to use any services relating to mailing.
