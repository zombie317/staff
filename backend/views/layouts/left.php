<aside class="main-sidebar">

    <section class="sidebar">
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Меню', 'options' => ['class' => 'header']],
                    ['label' => 'Организации', 'icon' => 'building', 'url' => ['/firm'],],
                    [
                        'label' => 'Сотрудники',
                        'icon' => 'users',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Сотрудники', 'icon' => 'user', 'url' => ['/employee'],],
                            ['label' => 'Паспортные данные', 'icon' => 'id-card', 'url' => ['/passport'],],
                        ],
                    ],
                    [
                        'label' => 'Приказы',
                        'icon' => 'file-text',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Приказы о приеме', 'icon' => 'file-text-o', 'url' => ['/recruitment'],],
                            ['label' => 'Приказы об увольнении', 'icon' => 'file-text-o', 'url' => ['/dismissal'],],
                            ['label' => 'Отпуска', 'icon' => 'file-text-o', 'url' => ['/vacation'],],
                            ['label' => 'Командировки', 'icon' => 'file-text-o', 'url' => ['/trips'],],
                            [
                                'label' => 'Виды отпусков',
                                'icon' => 'list',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Виды отпусков', 'icon' => 'list', 'url' => ['/type-vacation'],],
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => 'Штат',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Штатное расписание', 'icon' => 'book', 'url' => ['/staffing-plan'],],
                            ['label' => 'Должности', 'icon' => 'user-circle-o', 'url' => ['/position'],],
                            ['label' => 'Отделы', 'icon' => 'bank', 'url' => ['/department'],],
                        ],
                    ],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
