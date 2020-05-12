<?php

namespace Jakmall\Recruitment\Calculator\Commands;

use Illuminate\Console\Command;

class PowCommand extends Command
{
    /**
     * @var string
     */
    protected $signature;

    /**
     * @var string
     */
    protected $description;

    public function __construct()
    {
        $commandVerb = $this->getCommandVerb();

        $this->signature = sprintf(
            '%s {base : The base number} {exp : The exponent number}',
            $commandVerb
        );
        $this->description = 'Exponent the given Number';

        parent::__construct();
    }

    protected function getCommandVerb(): string
    {
        return 'pow';
    }

    public function handle(): void
    {
        $base = $this->argument('base');
        $exponent = $this->argument('exp');

        $description = $this->generateCalculationDescription($base, $exponent);
        $result = $this->calculateAll($base, $exponent);

        $this->comment(sprintf('%s = %s', $description, $result));
    }

    protected function generateCalculationDescription($base, $exponent): string
    {
        $operator = $this->getOperator();

        return sprintf('%s %s %s', $base, $operator, $exponent);
    }

    protected function getOperator(): string
    {
        return '^';
    }

    /**
     * @param array $numbers
     *
     * @return float|int
     */
    protected function calculateAll($base, $exponent)
    {
        return $this->calculate($base, $exponent);
    }

    /**
     * @param int|float $number1
     * @param int|float $number2
     *
     * @return int|float
     */
    protected function calculate($number1, $number2)
    {
        return pow($number1, $number2);
    }
}
