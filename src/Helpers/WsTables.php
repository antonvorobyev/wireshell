<?php namespace Wireshell\Helpers;

use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\Table;

/**
 * Class WsTables
 *
 * Contains table methods that could be used in every command
 *
 * @package Wireshell
 * @author Tabea David
 */
class WsTables {

    /**
     * @param OutputInterface $output
     * @param array $content
     * @param array $headers
     */
    public function buildTable(OutputInterface $output, $content, $headers) {
        $tablePW = new Table($output);
        $tablePW
            ->setStyle('borderless')
            ->setHeaders($headers)
            ->setRows($content);

        return $tablePW;
    }

    /**
     * @param OutputInterface $output
     * @param array $tables
     * @param boolean $nlBefore, default true
     */
    public function renderTables(OutputInterface $output, $tables, $nlBefore = true) {
        if ($nlBefore) $output->writeln("\n");

        foreach ($tables as $table) {
            $table->render();
            $output->writeln('');
        }
    }

    public function writeTable(OutputInterface $output, $text) {
        $table = new Table($output);
        $table->setHeaders(array($text));
        $table->render();
    }
}
