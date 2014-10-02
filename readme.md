This Laravel 5 package extends the built in Twitter Bootstrap styled pagination
slider HTML markup to provide Zurb Foundation styled pagination slider HTML markup.

## Installation

This release v1.0.0 supports the following versions of Laravel:
        "laravel/framework": "5.0.*"

Begin by installing this package through Composer. Edit your project's `composer.json` file to
require `eduard44/foundation-pagination`.

    "require": {
        "eduard44/foundation-pagination": "1.0.*"
    }

Next, update Composer from the Terminal:

    composer update

Once this operation completes, the next step is to add the service provider.
Open `app/config/app.php`, and add a new item to the providers array.

    'Chromabits\FoundationPagination\FoundationPaginationServiceProvider',

The final step is to reference one of the the pagination styles. Open `app/config/view.php`,
and modify the pagination item in the array.

For normal style use:

    'pagination' => 'foundationpagination::slider',

For centered style use:

    'pagination' => 'foundationpagination::slider-center',

That's it! You're all set to go.

## Usage

Just use pagination as you would normally and the markups generated for the links
will be styled for Zurb Foundation framework.

For more information on Pagination with Laravel 5, please check out the docs at

    http://laravel.com/docs/pagination
