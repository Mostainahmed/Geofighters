<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-06-06 11:32:41 --> Severity: Notice --> Undefined variable: report_demo_data /var/www/html/hydrokleen/v2/application/views/bianalysis/view_bianalysis_salesreport.php 44
ERROR - 2020-06-06 13:49:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '-1' at line 10 - Invalid query: SELECT *, (SELECT clientname FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS clientname, (SELECT phone1 FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS phone1, (SELECT COUNT(DISTINCT(clientaccode)) FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid) AS account, (SELECT teamname FROM tbl_ServiceTeam WHERE serviceid = tbl_ServiceRequest.serviceid) AS teamname
FROM `tbl_ServiceRequest`
WHERE   (
`servicedate` LIKE '%' ESCAPE '!'
 )
AND   (
`clientid` LIKE 'R%' ESCAPE '!'
 )
ORDER BY `servicedate` DESC, `servicedate` DESC
 LIMIT -1
ERROR - 2020-06-06 15:07:13 --> Severity: Notice --> Undefined index: date_from /var/www/html/hydrokleen/v2/application/models/Model_Report.php 17
ERROR - 2020-06-06 15:07:13 --> Severity: Notice --> Undefined index: date_to /var/www/html/hydrokleen/v2/application/models/Model_Report.php 18
ERROR - 2020-06-06 15:07:13 --> Severity: Notice --> Undefined index: date_from /var/www/html/hydrokleen/v2/application/models/Model_Report.php 25
ERROR - 2020-06-06 15:07:13 --> Severity: Notice --> Undefined index: date_to /var/www/html/hydrokleen/v2/application/models/Model_Report.php 25
ERROR - 2020-06-06 15:07:13 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND `servicedate` < `IS` `NULL`
 )
AND   (
`servicedate` LIKE '%' ESCAPE ' at line 4 - Invalid query: SELECT *, (SELECT clientname FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS clientname, (SELECT phone1 FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS phone1, (SELECT COUNT(DISTINCT(clientaccode)) FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid) AS account, (SELECT teamname FROM tbl_ServiceTeam WHERE serviceid = tbl_ServiceRequest.serviceid) AS teamname
FROM `tbl_ServiceRequest`
WHERE   (
`servicedate` > `IS` `NULL`
AND `servicedate` < `IS` `NULL`
 )
AND   (
`servicedate` LIKE '%' ESCAPE '!'
 )
ORDER BY `servicedate` DESC, `servicedate` DESC
 LIMIT 20
