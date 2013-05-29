This Laravel 4 package extends the built in Twitter Bootstrap styled pagination slider HTML markup to provide Zurb Foundation styled pagination slider HTML markup.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `binarix/foundation-pagination`.

    "require": {
        "laravel/framework": "4.0.*",
        "binarix/foundation-pagination": "dev-master"
    }

Next, update Composer from the Terminal:

    composer update

Once this operation completes, the next step is to add the service provider. Open `app/config/app.php`, and add a new item to the providers array.

    'Binarix\FoundationPagination\FoundationPaginationServiceProvider',

The final step is to reference the pagination style. Open `app/config/view.php`, and modify the pagination item in the array.

    'pagination' => 'foundationpagination::slider',

That's it! You're all set to go.

## Usage

Just use pagination as you would normally and the markups generated for the links will be styled for Zurb Foundation framework.

For more information on Pagination with Laravel 4, please check out the docs at

    http://laravel.com/docs/pagination