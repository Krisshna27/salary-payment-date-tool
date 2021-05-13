## Salary payment date tool

Application to determine the dates on which a company needs to pay salaries to their employees.

- Sales staff gets a monthly fixed base salary and a monthly bonus.
The base salaries are paid on the last day of the month unless that day is a Saturday or a Sunday (weekend).

- On the 15th of every month bonuses are paid for the previous month, unless that day is a weekend. In that case, they are paid the first Wednesday after the 15th. 

- The output of the utility should be a CSV file, containing the payment dates for the remainder of this year. 

- The CSV file should contain a column for the month name, a column that contains the salary payment date for that month, and a column that contains the bonus payment date.

<br/>
<br/>

### How to run

Rune the below command to execute the application

'php CalculatePayrollDates.php <output-file-name.csv>'