<?php

use App\Filament\Pages\Logs;

return [
    /**
     * Set true to display navigation item in the group.
     * You can set the name of the navigation in the translation file.
     */
    'navigation_group' => true,

    /**
     * Navigation icon.
     */
    'navigation_icon' => 'heroicon-o-document-text',

    /**
     * The directory(ies) containing the log files.
     */
    'logs_directory' => storage_path('logs'),

    /**
     * Allow deleting logs from the user interface.
     */
    'allow_delete' => true,

    /**
     * Allow downloading logs from the user interface.
     */
    'allow_download' => true,

    /**
     * Allow set custom logs page class.
     */
    'page_class' => Logs::class,
];
