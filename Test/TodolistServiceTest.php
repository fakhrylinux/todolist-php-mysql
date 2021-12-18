<?php

use Entity\Todolist;
use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;


require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";
require_once __DIR__ . "/../Config/Database.php";

function testShowTodolist(): void
{
    $connection = \Config\Database::getConnection();
    $todolistRepository = new TodolistRepositoryImpl($connection);
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->addTodoList("Finland");
    $todolistService->addTodoList("Deutsch");
    $todolistService->addTodoList("England");

    $todolistService->showTodolist();
}

function testAddTodolist(): void
{
    $connection = \Config\Database::getConnection();
    $todolistRepository = new TodolistRepositoryImpl($connection);

    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->addTodoList("Canada");
    $todolistService->addTodoList("Japan");
    $todolistService->addTodoList("Australia");

//    $todolistService->showTodolist();
}

function testRemoveTodolist(): void
{
    $connection = \Config\Database::getConnection();

    $todolistRepository = new TodolistRepositoryImpl($connection);

    $todolistService = new TodolistServiceImpl($todolistRepository);

    echo $todolistService->removeTodolist(7) . PHP_EOL;
    echo $todolistService->removeTodolist(6) . PHP_EOL;
    echo $todolistService->removeTodolist(5) . PHP_EOL;
    echo $todolistService->removeTodolist(4) . PHP_EOL;
    echo $todolistService->removeTodolist(3) . PHP_EOL;
    echo $todolistService->removeTodolist(2) . PHP_EOL;
    echo $todolistService->removeTodolist(1) . PHP_EOL;
}

//testRemoveTodolist();
//testAddTodolist();
testShowTodolist();