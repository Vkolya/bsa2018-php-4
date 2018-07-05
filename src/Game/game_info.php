<?php

return [
    'availible_commands' => [
           'help' => 'Список доступных команд',
           'status' => 'Кол-во доступных ресурсов и какие части корабля еще не собраны',
           'build:<spaceship_module>' => 'Построить модуль корабля',
           'scheme:<spaceship_module>' => 'Информация/схема о том какие модули/ресурсы нужны, чтобы построить модуль',
           'mine:<resource_name>'  => 'Добавить единицу ресурса(fire) в инвентарь/склад',
           'produce:<combined_resource>' => 'Произвести комбинированный ресурс(метал)',
           'exit' => 'Выход из игры'
    ],
    'availible_spaceship_modules' => ['shell','porthole','engine','control_unit','launcher','tank','wires','ic'],
    'availible_resourses' => ['fire','sand','iron','silicon','copper','carbon','water','fuel'],
    'availible_combined_resourses' => ['metal'],
    'messages' => [
        'module_is_ready' => '%s is ready!',
        'module_is_ready_and_game_finished' => '%s is ready! => You won!',
    ]
    
];
