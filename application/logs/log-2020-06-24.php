<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-06-24 11:17:25 --> Severity: Notice --> Undefined index: name /var/www/html/hydrokleen/v2/application/views/view_container.php 255
ERROR - 2020-06-24 11:17:25 --> Severity: Notice --> Undefined index: name /var/www/html/hydrokleen/v2/application/views/view_container.php 290
ERROR - 2020-06-24 11:48:00 --> Severity: Parsing Error --> syntax error, unexpected 'tbl_ServiceTeamStatus' (T_STRING), expecting function (T_FUNCTION) /var/www/html/hydrokleen/v2/application/models/Model_Service.php 183
ERROR - 2020-06-24 11:49:11 --> Severity: Notice --> Undefined index: date /var/www/html/hydrokleen/v2/application/models/Model_Service.php 200
ERROR - 2020-06-24 11:49:11 --> Severity: Notice --> Undefined index: date /var/www/html/hydrokleen/v2/application/models/Model_Service.php 201
ERROR - 2020-06-24 12:33:26 --> Severity: Parsing Error --> syntax error, unexpected '' (T_ENCAPSED_AND_WHITESPACE), expecting identifier (T_STRING) or variable (T_VARIABLE) or number (T_NUM_STRING) /var/www/html/hydrokleen/v2/application/models/Model_Service.php 190
ERROR - 2020-06-24 12:34:52 --> Severity: Warning --> Illegal string offset 'draw' /var/www/html/hydrokleen/v2/application/models/Model_Service.php 186
ERROR - 2020-06-24 12:34:52 --> Severity: Warning --> Illegal string offset 'start' /var/www/html/hydrokleen/v2/application/models/Model_Service.php 187
ERROR - 2020-06-24 12:34:52 --> Severity: Warning --> Illegal string offset 'data' /var/www/html/hydrokleen/v2/application/models/Model_Service.php 202
ERROR - 2020-06-24 12:34:52 --> Severity: Notice --> Array to string conversion /var/www/html/hydrokleen/v2/application/models/Model_Service.php 202
ERROR - 2020-06-24 12:34:52 --> Severity: Warning --> Illegal string offset 'recordsFiltered' /var/www/html/hydrokleen/v2/application/models/Model_Service.php 203
ERROR - 2020-06-24 12:34:52 --> Severity: Warning --> Illegal string offset 'recordsFiltered' /var/www/html/hydrokleen/v2/application/models/Model_Service.php 204
ERROR - 2020-06-24 12:34:52 --> Severity: Warning --> Illegal string offset 'recordsTotal' /var/www/html/hydrokleen/v2/application/models/Model_Service.php 204
ERROR - 2020-06-24 12:39:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AS doneworkcount, (SELECT COUNT(*) FROM tbl_ServiceRequestItems WHERE servicei' at line 1 - Invalid query: SELECT *, (SELECT COUNT(*) FROM tbl_ServiceRequestItems WHERE serviceid IN (SELECT serviceid FROM tbl_ServiceRequest WHERE servicedate = '2019-09-14' AND service_team = tbl_ServiceTeamStatus.teamid)) AS totalworkcount, (SELECT COUNT(*) FROM tbl_ServiceRequestItems WHERE serviceid IN (SELECT serviceid FROM tbl_ServiceRequest WHERE servicedate = '2019-09-14' AND service_team = tbl_ServiceTeamStatus.teamid) AND statuscode = 8)) AS doneworkcount, (SELECT COUNT(*) FROM tbl_ServiceRequestItems WHERE serviceid IN (SELECT serviceid FROM tbl_ServiceRequest WHERE servicedate = '2019-09-14' AND service_team = tbl_ServiceTeamStatus.teamid) AND statuscode = 5)) AS cancelworkcount
FROM `tbl_ServiceTeamStatus`
WHERE `date` = '2019-09-14'
ORDER BY `teamid` ASC
 LIMIT 10
