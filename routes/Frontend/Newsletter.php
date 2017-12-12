<?php

Route::resource('newsletters', 'NewsletterController', [
    'names' => [
        'index' => 'frontend.newsletters.index',
        'create' => 'frontend.newsletters.create',
        'store' => 'frontend.newsletters.store',
        'edit' => 'frontend.newsletters.edit',
        'update' => 'frontend.newsletters.update',
        'destroy' => 'frontend.newsletters.destroy',
        'show' => 'frontend.newsletters.show',
    ]
]);