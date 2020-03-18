<?php


namespace src\Modules\Script\Domain\Service;

class ScriptResponseService
{
    private function htmlTable(array $recordResult): string
    {
        $drawResult = [];
        $keys = array_keys($recordResult[0]);
        $drawResult[]= "<table><tr>";
        foreach ($keys as $key) {
            $drawResult[]= "<th> $key </th>";
        }
        $drawResult[]= "</tr>";
        foreach ($recordResult as $columns) {
            $drawResult[]= "<tr>";
            foreach ($columns as $column) {
                $drawResult[]= "<td> $column </td>";
            }
            $drawResult[]= "</tr>";
        }
        return implode($drawResult);
    }

    private function htmlSuccess(bool $recordResult): string
    {
        if ($recordResult) {
            return "<p>Success</p>";
        }
        else return "<p>Error</p>";
    }

    public function getResponse($recordResult)
    {
        if (is_array($recordResult)) {
            return $this->htmlTable($recordResult);
        }
        elseif (is_bool($recordResult)) {
            $this->htmlSuccess($recordResult);
        }
    }
}