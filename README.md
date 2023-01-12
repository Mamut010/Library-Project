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

<p>
    To run the application. Laravel/spatie must first be installed.
    If you have not installed Laravel/spatie, follow <a href="https://spatie.be/docs/laravel-permission/v5/installation-laravel">this guide</a>.
</p>
<p>
    The application assumes that the default asset URL host is <strong>&ltAPP_URL&gt/assets</strong>. To set default asset URL host, in your <strong>.env</strong> file,       set the <strong>ASSET_URL</strong> variable to <strong>&ltAPP_URL&gt/assets</strong>, where <strong>&ltAPP_URL&gt</strong> is the value of 
    <strong>APP_URL</strong> variable.
</p>
<p>
    You may need to run these Artisan commands in order to properly run the application:
    <ul> 
        <li>
            <code>composer dump-autoload</code> Artisan command to load global helper functions.
        </li>
        <li>
            <code>php artisan storage:link</code> Artisan command to create the symbolic link. You can read more about symbolic link <a                                               href="https://laravel.com/docs/9.x/filesystem#the-public-disk">here</a>.
        </li>
    </ul>
</p>
<p>
    <strong>Note:</strong> you must config your own mail related settings in your <strong>.env</strong> file to use any services relating to mailing.
</p>