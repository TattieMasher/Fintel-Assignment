<?php

use MylesDuncanKing\SimpleMigration\SimpleMigration;

return new class extends SimpleMigration
{
    protected array $migration = [
        'tasks' => [
            'id',
            'string:title',
            'string:description',
            'tinyInteger:priority' => ['default:1'],
            'boolean:completed' => ['default:false'],
            'timestamps',
        ],
    ];
};