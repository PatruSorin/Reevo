<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class calculator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:calculator {first_value} {operator} {second_value?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $operator = $this->argument("operator");
        $first_value = $this->argument("first_value");
        $second_value = $this->argument("second_value");

        if(!is_numeric($first_value)) {
            $this->error("This operation requires two numerical values");
            return;
        }

        switch ($operator) {
            case '+':
                if($second_value == null || !is_numeric($second_value)) {
                    $this->error("This operation requires two numerical values");
                    return;
                }
                $this->line($first_value + $second_value);
                break;
            case '-':
                if($second_value == null || !is_numeric($second_value)) {
                    $this->error("This operation requires two numerical values");
                    return;
                }
                $this->line($first_value - $second_value);
                break;
            case '*':
                if($second_value == null || !is_numeric($second_value)) {
                    $this->error("This operation requires two numerical values");
                    return;
                }
                $this->line($first_value * $second_value);
                break;
            case '/':
                if($second_value == null || !is_numeric($second_value)) {
                    $this->error("This operation requires two numerical values");
                    return;
                }

                if($second_value == 0) {
                    $this->error("Cannot divide by 0");
                    return;
                }

                $this->line($first_value / $second_value);
                break;
            case 'sqrt':
                $this->line(sqrt($first_value)); 
                break;
                
            default:
                $this->fail('Unknown operator');
                break;
        }
    }
}
