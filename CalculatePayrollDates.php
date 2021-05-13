<?PHP

/**
 * This program is to find the salary and bonus payment dates to the employees for the current year & month.
 * 
 * This application reads command line argument which will be the output file name. (CSV)
 * 
 * @author Krisshna Kumar Mone
 */


include 'PayrollDate.php';

$fileName = $argv[1];
$fileContent = calculatePayrollDates();
writeToFile($fileContent, $fileName);

echo "Payroll dates computed for current year. Output can be found in the file : ".$fileName;

/**
 * This function calculates payroll dates starting from current month until the end of the current year.
 */
function calculatePayrollDates(){
    $currentYear = date('Y');
    $currentMonth = date('m');
    $payrollDates = array();

    while($currentMonth <= 12){
        array_push($payrollDates, new PayrollDate($currentMonth, $currentYear));
        $currentMonth++;
    }
    return $payrollDates;
}

/**
 * Writes the dates computed to the file for which the file name is read from the command line.
 */
function writeToFile($payrollDates, $fileName) {
    $file = fopen( $fileName, "w" );
    
    $headers = array("Month", "Salary Date", "Bonus Date");
    fputcsv($file,$headers);

    foreach($payrollDates as $paymentDate) {
        $record = array($paymentDate->getPayrollMonthName(),
            $paymentDate->getSalaryPaymentDate(),$paymentDate->getBonusPaymentDate());
        
        fputcsv($file, $record);
    }
    fclose($file);
}

?>