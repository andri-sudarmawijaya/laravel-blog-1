Basic Blog Package
==================
This package is under development.

Add the package service provider to the `providers` array on `/config/app.php`:

~~~php
// /config/app.php
'providers' => [
    // Blog Package
    Carawebs\Blog\BlogProvider::class
];
~~~

Add the `BlogUserTrait` to your `User` model. This sets up Eloquent relationships:

~~~php
<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carawebs\Blog\Traits\BlogUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use BlogUserTrait;

}
~~~
