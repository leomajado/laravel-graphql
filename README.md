<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img 
            src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" 
            width="250"
        >
    </a><br>
    <a href="https://lighthouse-php.com" target="_blank">
        <img 
            src="https://lighthouse-php.com/logo.svg" 
            width="50"
            alt="Lighthouse"
        >
    </a>
</p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Installation and configuration

## Open a Terminal and run the following commands:  

1) composer require nuwave/lighthouse laravel/passport joselfonseca/lighthouse-graphql-passport-auth

2) php artisan migrate

3) php artisan passport:install

    3.1 Add the passport key to your **.env** file.
        
            PASSPORT_CLIENT_ID=2
            PASSPORT_CLIENT_SECRET=viF8y13ajlDeigxcZi7kUqQjazseDT7lvI3xasSg
    
    3.2 Add HasApiTokens to your user Model.

            use Laravel\Passport\HasApiTokens;
            use Illuminate\Notifications\Notifiable;
            use Illuminate\Foundation\Auth\User as Authenticatable;
            use Laravel\Passport\HasApiTokens;
            
            class User extends Authenticatable
            {
                use HasApiTokens, Notifiable;
            }
    
    3.3 Modify the file App\Providers\AuthServiceProvider. <br>

            Add the Laravel Passport facade -> use Laravel\Passport\Passport;
            Uncomment the line -> 'App\Model' => 'App\Policies\ModelPolicy' <br>
            Add the method routes() in function Boot() ->  Passport::routes(); below $this->registerPolicies();
    
    3.4 Add in the file config/auth.php the api section with the following options:

            'api' => [
                'driver' => 'passport',
                'provider' => 'users',
            ],
    
4) Publish the default schema running this command: The file **app/graphql/schema.graphql** will be created.

    php artisan vendor:publish --tag=lighthouse-schema

5) Publish the auth schema and package configuration running the following command:
    
    php artisan vendor:publish --provider="Joselfonseca\LighthouseGraphQLPassport\Providers\LighthouseGraphQLPassportServiceProvider"

6) Update the config file **config/lighthouse-graphql-passport**

    'schema' => base_path('graphql/auth.graphql')

7) Move the **type user** from **app/graphql/auth.graphql** to **app/graphql/schema.graphql**
    
    type User { <br>
        &nbsp;&nbsp;&nbsp; id: ID! <br>
        &nbsp;&nbsp;&nbsp; name: String! <br>
        &nbsp;&nbsp;&nbsp; email: String! <br>
        &nbsp;&nbsp;&nbsp; email_verified_at: DateTime <br>
        &nbsp;&nbsp;&nbsp; created_at: DateTime! <br>
        &nbsp;&nbsp;&nbsp; updated_at: DateTime! <br>
    }

8) Move the **mutation** from **app/graphql/auth.graphql** to **app/graphql/schema.graphql**

9) Remove the word "extend" in the mutation described in the previous step.

    type Mutation { <br>
    &nbsp;&nbsp;&nbsp; ... <br>
    &nbsp;&nbsp;&nbsp; ... <br>
    }

10) Test with a HTTP request tool the endpoint: http://localhost/graphql

    query{ <br>
        &nbsp;&nbsp;&nbsp; user(id: 1){ <br>
        &nbsp;&nbsp;&nbsp; name <br>
        &nbsp;&nbsp;&nbsp; created_at <br>
        &nbsp;&nbsp;&nbsp; } <br>
    }

<br>
<hr>

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
