<?php


namespace src\Modules\Script\Domain\Repository;


interface SqlHandlerRepositoryInterface
{
    public function sqlRequest(string $request);
}