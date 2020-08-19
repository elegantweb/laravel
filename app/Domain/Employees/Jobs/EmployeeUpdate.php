<?php

namespace App\Domain\Employees\Jobs;

use App\Domain\Employees\Employee;
use App\Domain\Employees\Data\EmployeeUpdateData;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class EmployeeUpdate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Employee $employee;
    protected EmployeeUpdateData $data;

    /**
     * Create a new job instance.
     *
     * @param Employee $employee
     * @param EmployeeUpdateData $data
     * @return void
     */
    public function __construct(Employee $employee, EmployeeUpdateData $data)
    {
        $this->employee = $employee;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $attrs = $this->data->toArray();

        $this->employee->update($attrs);
    }
}
