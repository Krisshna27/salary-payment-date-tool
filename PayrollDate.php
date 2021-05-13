<?PHP

/**
 * Payroll Date model to compute salary and bonus payment dates based
 * on provided month and year.
 * 
 * @author Krisshna Kumar Mone
 */

class PayrollDate{

    public $month;

    public $year;
 
    function __construct($month, $year){
        $this->month = $month;
        $this->year = $year;
    }

    /**
     * Function to get salary payment date based on last working day of the month.
     * 
     * @return date salary payment date
     */
    function getSalaryPaymentDate(){
        $monthName = date('F', mktime(0, 0, 0, $this->month, 10));
        $salaryPaymentDate = strtotime('last weekday '.date("F Y", strtotime('next month '.$monthName.' '.$this->$year)));
        return date('d-m-Y', $salaryPaymentDate);
    }

    /**
     * Function to get bonus payment date based on 15th of the month being not a weekend
     * else provides the date of Wednesday after the 15th.
     * 
     * @return date bonus payment date
     */
    function getBonusPaymentDate(){
        $bonusDay = strtolower(date("l", strtotime($this->year."-".$this->month."-15")));
        return ($bonusDay == "saturday" )|| ($bonusDay == "sunday") ? 
            date('d-m-Y', strtotime($this->year."-".$this->month."-15 next Wednesday")):
            "15-".$this->month."-".$this->year;
    }

    /**
     * Function to get the payroll month as text.
     * 
     * @return string payroll month.
     */
    function getPayrollMonthName(){
        return date('F', mktime(0, 0, 0, $this->month, 10));
    }
}

?>