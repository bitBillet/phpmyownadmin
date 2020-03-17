<?php


namespace src\Modules\Script\Domain\Service;


class DrawTableService
{
    public static function drawSelectTable(array $model): string
    {
        $drawResult = [];
        $keys = array_keys($model[1][0]);
        $drawResult[]= "<table><tr>";
        foreach ($keys as $key) {
            $drawResult[]= "<th> $key </th>";
        }
        $drawResult[]= "</tr>";
        foreach ($model[1] as $columns) {
            $drawResult[]= "<tr>";
            foreach ($columns as $column) {
                $drawResult[]= "<td> $column </td>";
            }
            $drawResult[]= "</tr>";
        }
        return implode($drawResult);
    }

    public static function drawTable(array $model): string
    {
        $drawResult = [];
        foreach ($model as $rows) {
            foreach ($rows as $row) {
                $drawResult[]= "<p> $row </p>";
            }
        }
        return implode($drawResult);
    }
}