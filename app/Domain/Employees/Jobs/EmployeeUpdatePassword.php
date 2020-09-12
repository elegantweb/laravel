<?php

namespace App\Domain\Employees\Jobs;

use App\Domain\Employees\Models\Employee;
use App\Domain\Employees\Data\EmployeeUpdatePasswordData;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class EmployeeUpdatePassword implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Employee $employee;
    protected EmployeeUpdatePasswordData $data;

    /**
     * Create a new job instance.
     *
     * @param Employee $employee
     * @param EmployeeUpdatePasswordData $data
     * @return void
     */
    public function __construct(Employee $employee, EmployeeUpdatePasswordData $data)
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
        $attrs = [];
        $attrs['password'] = bcrypt($this->data->password);

        $this->employee->update($attrs);
    }
}
