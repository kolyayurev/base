<?php

return [

    /*
     * Set the names of files you want to add to generated javascript.
     * Otherwise all the files will be included.
     *
     * 'messages' => [
     *     'validation',
     *     'forum/thread',
     * ],
     */
    'messages' => [
        'common',
        'validation',
    ],

    /*
     * The default path to use for the generated javascript.
     */
    'path' => resource_path('js/i18n/messages.json'),
];
