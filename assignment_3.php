<?php

// Perform a SELECT query using the object-oriented mysqli interface.
// http://php.net/manual/en/mysqli.query.php
//
// For your query, you will need to join the customers and employees
// tables together.
$query_result = $mysql_connection->query("SELECT your query here");


$query_result = $mysql_connection->query("SELECT customerName, firstName, lastName FROM customers, country, employees WHERE customers.salesRepEmployeeNumber = employees.employeeNumber ORDER BY country, customerName");

// Make sure there wasn't an error with the query.
if ($query_result !== false) {
    // Fetch each row of the query result as an associative array.
    // http://php.net/manual/en/mysqli-result.fetch-assoc.php
    while($row_array = $query_result->fetch_assoc()) {
	    // Your output goes here
    }

        echo $row_array['customerName'] . ", " . $row_array['country'] . " - " . $row_array['firstName'] . " " .
             $row_array['lastName'] . ".\n";
      }

    // We're done with the query result set, so free it.
    // This frees up the memory the result set object was using.
    // http://php.net/manual/en/mysqli-result.free.php
    $query_result->free();
} else {
    // http://php.net/manual/en/mysqli.error.php
    echo "The query failed: $mysql_connection->error\n";
    exit(2);
}


