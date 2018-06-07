<?php
namespace DataSourcePropel\Migrate;

return [
    'console' => [
        'router' => [
            'routes' => [
                'propel-build' => [
                    'options' => [
                        'route' => 'propel build <namespace>',
                        'defaults' => [
							'controller' => 'migrateController',
                            'action' => 'build'
                        ]
                    ]
                ],
                'propel-build-sql' => [
                    'options' => [
                        'route' => 'propel build-sql <namespace>',
                        'defaults' => [
							'controller' => 'migrateController',
                            'action' => 'build-sql'
                        ]
                    ]
                ],
                'propel-diff' => [
                    'options' => [
                        'route' => 'propel diff <namespace> [all|dev|stage|qa|production]:env',
                        'defaults' => [
							'controller' => 'migrateController',
                            'action' => 'diff'
                        ]
                    ]
                ],
                'propel-down' => [
                    'options' => [
                        'route' => 'propel down <namespace>',
                        'defaults' => [
							'controller' => 'migrateController',
                            'action' => 'down'
                        ]
                    ]
                ],
                'propel-migrate' => [
                    'options' => [
                        'route' => 'propel migrate <namespace>',
                        'defaults' => [
							'controller' => 'migrateController',
                            'action' => 'migrate'
                        ]
                    ]
                ],
                'propel-status' => [
                    'options' => [
                        'route' => 'propel status <namespace>',
                        'defaults' => [
							'controller' => 'migrateController',
                            'action' => 'status'
                        ]
                    ]
                ],
                'propel-up' => [
                    'options' => [
                        'route' => 'propel up <namespace>',
                        'defaults' => [
							'controller' => 'migrateController',
                            'action' => 'up'
                        ]
                    ]
                ],
                'propel-migration-diff' => [
                    'options' => [
                        'route' => 'propel migration-diff <namespace> [all|dev|stage|qa|production]:env',
                        'defaults' => [
							'controller' => 'migrateController',
                            'action' => 'diff'
                        ]
                    ]
                ],
                'propel-migration-down' => [
                    'options' => [
                        'route' => 'propel migration-down <namespace>',
                        'defaults' => [
							'controller' => 'migrateController',
                            'action' => 'down'
                        ]
                    ]
                ],
                'propel-migration-migrate' => [
                    'options' => [
                        'route' => 'propel migration-migrate <namespace>',
                        'defaults' => [
							'controller' => 'migrateController',
                            'action' => 'migrate'
                        ]
                    ]
                ],
                'propel-migration-status' => [
                    'options' => [
                        'route' => 'propel migration-status <namespace>',
                        'defaults' => [
							'controller' => 'migrateController',
                            'action' => 'status'
                        ]
                    ]
                ],
                'propel-migration-up' => [
                    'options' => [
                        'route' => 'propel migration-up <namespace>',
                        'defaults' => [
							'controller' => 'migrateController',
                            'action' => 'up'
                        ]
                    ]
                ],
                'propel-model-build' => [
                    'options' => [
                        'route' => 'propel model-build <namespace>',
                        'defaults' => [
							'controller' => 'migrateController',
                            'action' => 'build'
                        ]
                    ]
                ],
                'propel-sql-build' => [
                    'options' => [
                        'route' => 'propel sql-build <namespace>',
                        'defaults' => [
							'controller' => 'migrateController',
                            'action' => 'build-sql'
                        ]
                    ]
                ],
                'propel-update' => [
                    'options' => [
                        'route' => 'propel update <namespace>',
                        'defaults' => [
							'controller' => 'migrateController',
                            'action' => 'update'
                        ]
                    ]
                ],
                'propel-migration' => [
                    'options' => [
                        'route' => 'propel migration <namespace> [all|dev|stage|qa|production]:env',
                        'defaults' => [
							'controller' => 'migrateController',
                            'action' => 'diff'
                        ]
                    ]
                ]
            ]
        ]
    ]
];
