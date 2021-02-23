<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-06-11 00:14:48 --> Severity: Notice --> Undefined index: HTTP_REFERER /var/www/html/hydrokleen/v2/application/controllers/crm/Client.php 31
ERROR - 2020-06-11 10:59:35 --> Severity: Notice --> Undefined index: HTTP_REFERER /var/www/html/hydrokleen/v2/application/controllers/crm/Client.php 31
ERROR - 2020-06-11 15:19:30 --> Severity: Notice --> Undefined index: company_name /var/www/html/hydrokleen/v2/application/views/modal/view_modal_add_servicetype.php 30
ERROR - 2020-06-11 15:19:30 --> Severity: Notice --> Undefined index: company_name /var/www/html/hydrokleen/v2/application/views/modal/view_modal_add_servicetype.php 30
ERROR - 2020-06-11 15:52:29 --> Severity: Notice --> Undefined variable: post /var/www/html/hydrokleen/v2/application/models/Model_Admin.php 64
ERROR - 2020-06-11 15:52:29 --> Severity: Notice --> Undefined variable: post /var/www/html/hydrokleen/v2/application/models/Model_Admin.php 65
ERROR - 2020-06-11 15:52:29 --> Severity: Notice --> Undefined variable: post /var/www/html/hydrokleen/v2/application/models/Model_Admin.php 66
ERROR - 2020-06-11 15:52:29 --> Severity: Notice --> Undefined variable: post /var/www/html/hydrokleen/v2/application/models/Model_Admin.php 66
ERROR - 2020-06-11 15:52:29 --> Severity: Notice --> Undefined variable: post /var/www/html/hydrokleen/v2/application/models/Model_Admin.php 67
ERROR - 2020-06-11 15:52:29 --> Severity: Notice --> Undefined variable: post /var/www/html/hydrokleen/v2/application/models/Model_Admin.php 68
ERROR - 2020-06-11 15:52:29 --> Severity: Notice --> Undefined variable: post /var/www/html/hydrokleen/v2/application/models/Model_Admin.php 68
ERROR - 2020-06-11 15:52:29 --> Severity: Notice --> Array to string conversion /var/www/html/hydrokleen/v2/application/controllers/hradmin/Admin.php 153
ERROR - 2020-06-11 15:53:17 --> Severity: Notice --> Undefined variable: post /var/www/html/hydrokleen/v2/application/models/Model_Admin.php 64
ERROR - 2020-06-11 15:53:17 --> Severity: Notice --> Undefined variable: post /var/www/html/hydrokleen/v2/application/models/Model_Admin.php 65
ERROR - 2020-06-11 15:53:17 --> Severity: Notice --> Undefined variable: post /var/www/html/hydrokleen/v2/application/models/Model_Admin.php 66
ERROR - 2020-06-11 15:53:17 --> Severity: Notice --> Undefined variable: post /var/www/html/hydrokleen/v2/application/models/Model_Admin.php 66
ERROR - 2020-06-11 15:53:17 --> Severity: Notice --> Undefined variable: post /var/www/html/hydrokleen/v2/application/models/Model_Admin.php 67
ERROR - 2020-06-11 15:53:17 --> Severity: Notice --> Undefined variable: post /var/www/html/hydrokleen/v2/application/models/Model_Admin.php 68
ERROR - 2020-06-11 15:53:17 --> Severity: Notice --> Undefined variable: post /var/www/html/hydrokleen/v2/application/models/Model_Admin.php 68
ERROR - 2020-06-11 15:53:17 --> Severity: Notice --> Array to string conversion /var/www/html/hydrokleen/v2/application/controllers/hradmin/Admin.php 153
ERROR - 2020-06-11 15:54:16 --> Severity: Notice --> Undefined variable: post /var/www/html/hydrokleen/v2/application/models/Model_Admin.php 64
ERROR - 2020-06-11 15:54:16 --> Severity: Notice --> Undefined variable: post /var/www/html/hydrokleen/v2/application/models/Model_Admin.php 65
ERROR - 2020-06-11 15:54:16 --> Severity: Notice --> Undefined variable: post /var/www/html/hydrokleen/v2/application/models/Model_Admin.php 66
ERROR - 2020-06-11 15:54:16 --> Severity: Notice --> Undefined variable: post /var/www/html/hydrokleen/v2/application/models/Model_Admin.php 66
ERROR - 2020-06-11 15:54:16 --> Severity: Notice --> Undefined variable: post /var/www/html/hydrokleen/v2/application/models/Model_Admin.php 67
ERROR - 2020-06-11 15:54:16 --> Severity: Notice --> Undefined variable: post /var/www/html/hydrokleen/v2/application/models/Model_Admin.php 68
ERROR - 2020-06-11 15:54:16 --> Severity: Notice --> Undefined variable: post /var/www/html/hydrokleen/v2/application/models/Model_Admin.php 68
ERROR - 2020-06-11 15:54:16 --> Severity: Notice --> Array to string conversion /var/www/html/hydrokleen/v2/application/controllers/hradmin/Admin.php 153
ERROR - 2020-06-11 16:11:41 --> Query error: Unknown column 'challanno' in 'order clause' - Invalid query: SELECT *
FROM `tbl_ServiceType`
WHERE `type` = 'retail'
AND `servicefor` = 'hydrokleen'
AND `deleted` = 0
ORDER BY `challanno` ASC
 LIMIT 10
ERROR - 2020-06-11 16:12:14 --> Severity: Notice --> Array to string conversion /var/www/html/hydrokleen/v2/application/controllers/hradmin/Admin.php 153
ERROR - 2020-06-11 16:13:05 --> Severity: Notice --> Array to string conversion /var/www/html/hydrokleen/v2/application/controllers/hradmin/Admin.php 153
ERROR - 2020-06-11 16:36:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'tbl_ServiceRequest`
WHERE   (
`servicedate` LIKE '%' ESCAPE '!'
 )
AND   (
`clie' at line 1 - Invalid query: SELECT *, (SELECT clientname FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS clientname, (SELECT phone1 FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS phone1, (SELECT COUNT(DISTINCT(clientaccode)) FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid) AS account, (SELECT teamname FROM tbl_ServiceTeam WHERE serviceid = tbl_ServiceRequest.serviceid) AS teamname, (SELECT CONCAT(areaname, " - ", `landmark`, " `Rd#"`, raodno) FROM tbl_Clients_Addr WHERE id = (SELECT locationid FROM tbl_ClientAcList WHERE clientaccode = (SELECT clientaccode FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid LIMIT 1) LIMIT 1) LIMIT 1) AS address
FROM `tbl_ServiceRequest`
WHERE   (
`servicedate` LIKE '%' ESCAPE '!'
 )
AND   (
`clientid` LIKE 'R%' ESCAPE '!'
 )
ORDER BY `service_team` ASC, `serialpriority` ASC
 LIMIT 100
ERROR - 2020-06-11 16:36:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'tbl_ServiceRequest`
WHERE   (
`servicedate` LIKE '2020-06-11%' ESCAPE '!'
 )
AND' at line 1 - Invalid query: SELECT *, (SELECT clientname FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS clientname, (SELECT phone1 FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS phone1, (SELECT COUNT(DISTINCT(clientaccode)) FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid) AS account, (SELECT teamname FROM tbl_ServiceTeam WHERE serviceid = tbl_ServiceRequest.serviceid) AS teamname, (SELECT CONCAT(areaname, " - ", `landmark`, " `Rd#"`, raodno) FROM tbl_Clients_Addr WHERE id = (SELECT locationid FROM tbl_ClientAcList WHERE clientaccode = (SELECT clientaccode FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid LIMIT 1) LIMIT 1) LIMIT 1) AS address
FROM `tbl_ServiceRequest`
WHERE   (
`servicedate` LIKE '2020-06-11%' ESCAPE '!'
 )
AND   (
`clientid` LIKE 'R%' ESCAPE '!'
 )
ORDER BY `service_team` ASC, `serialpriority` ASC
 LIMIT 100
ERROR - 2020-06-11 16:37:06 --> Query error: Unknown column 'raodno' in 'field list' - Invalid query: SELECT *, (SELECT clientname FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS clientname, (SELECT phone1 FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS phone1, (SELECT COUNT(DISTINCT(clientaccode)) FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid) AS account, (SELECT teamname FROM tbl_ServiceTeam WHERE serviceid = tbl_ServiceRequest.serviceid) AS teamname, (SELECT CONCAT(areaname, " - ", `landmark`, " Rd ", raodno) FROM tbl_Clients_Addr WHERE id = (SELECT locationid FROM tbl_ClientAcList WHERE clientaccode = (SELECT clientaccode FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid LIMIT 1) LIMIT 1) LIMIT 1) AS address
FROM `tbl_ServiceRequest`
WHERE   (
`servicedate` LIKE '%' ESCAPE '!'
 )
AND   (
`clientid` LIKE 'R%' ESCAPE '!'
 )
ORDER BY `service_team` ASC, `serialpriority` ASC
 LIMIT 100
ERROR - 2020-06-11 16:37:06 --> Query error: Unknown column 'raodno' in 'field list' - Invalid query: SELECT *, (SELECT clientname FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS clientname, (SELECT phone1 FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS phone1, (SELECT COUNT(DISTINCT(clientaccode)) FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid) AS account, (SELECT teamname FROM tbl_ServiceTeam WHERE serviceid = tbl_ServiceRequest.serviceid) AS teamname, (SELECT CONCAT(areaname, " - ", `landmark`, " Rd ", raodno) FROM tbl_Clients_Addr WHERE id = (SELECT locationid FROM tbl_ClientAcList WHERE clientaccode = (SELECT clientaccode FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid LIMIT 1) LIMIT 1) LIMIT 1) AS address
FROM `tbl_ServiceRequest`
WHERE   (
`servicedate` LIKE '2020-06-11%' ESCAPE '!'
 )
AND   (
`clientid` LIKE 'R%' ESCAPE '!'
 )
ORDER BY `service_team` ASC, `serialpriority` ASC
 LIMIT 100
ERROR - 2020-06-11 16:37:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'tbl_ServiceRequest`
WHERE   (
`servicedate` LIKE '%' ESCAPE '!'
 )
AND   (
`clie' at line 1 - Invalid query: SELECT *, (SELECT clientname FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS clientname, (SELECT phone1 FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS phone1, (SELECT COUNT(DISTINCT(clientaccode)) FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid) AS account, (SELECT teamname FROM tbl_ServiceTeam WHERE serviceid = tbl_ServiceRequest.serviceid) AS teamname, (SELECT CONCAT(areaname, " - ", `landmark`, " `Rd#"`, roadno) FROM tbl_Clients_Addr WHERE id = (SELECT locationid FROM tbl_ClientAcList WHERE clientaccode = (SELECT clientaccode FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid LIMIT 1) LIMIT 1) LIMIT 1) AS address
FROM `tbl_ServiceRequest`
WHERE   (
`servicedate` LIKE '%' ESCAPE '!'
 )
AND   (
`clientid` LIKE 'R%' ESCAPE '!'
 )
ORDER BY `service_team` ASC, `serialpriority` ASC
 LIMIT 100
ERROR - 2020-06-11 16:37:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'tbl_ServiceRequest`
WHERE   (
`servicedate` LIKE '2020-06-11%' ESCAPE '!'
 )
AND' at line 1 - Invalid query: SELECT *, (SELECT clientname FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS clientname, (SELECT phone1 FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS phone1, (SELECT COUNT(DISTINCT(clientaccode)) FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid) AS account, (SELECT teamname FROM tbl_ServiceTeam WHERE serviceid = tbl_ServiceRequest.serviceid) AS teamname, (SELECT CONCAT(areaname, " - ", `landmark`, " `Rd#"`, roadno) FROM tbl_Clients_Addr WHERE id = (SELECT locationid FROM tbl_ClientAcList WHERE clientaccode = (SELECT clientaccode FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid LIMIT 1) LIMIT 1) LIMIT 1) AS address
FROM `tbl_ServiceRequest`
WHERE   (
`servicedate` LIKE '2020-06-11%' ESCAPE '!'
 )
AND   (
`clientid` LIKE 'R%' ESCAPE '!'
 )
ORDER BY `service_team` ASC, `serialpriority` ASC
 LIMIT 100
ERROR - 2020-06-11 16:39:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'tbl_ServiceRequest`
WHERE   (
`servicedate` LIKE '%' ESCAPE '!'
 )
AND   (
`clie' at line 1 - Invalid query: SELECT *, (SELECT clientname FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS clientname, (SELECT phone1 FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS phone1, (SELECT COUNT(DISTINCT(clientaccode)) FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid) AS account, (SELECT teamname FROM tbl_ServiceTeam WHERE serviceid = tbl_ServiceRequest.serviceid) AS teamname, (SELECT CONCAT(areaname, " `Rd#"`, roadno) FROM tbl_Clients_Addr WHERE id = (SELECT locationid FROM tbl_ClientAcList WHERE clientaccode = (SELECT clientaccode FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid LIMIT 1) LIMIT 1) LIMIT 1) AS address
FROM `tbl_ServiceRequest`
WHERE   (
`servicedate` LIKE '%' ESCAPE '!'
 )
AND   (
`clientid` LIKE 'R%' ESCAPE '!'
 )
ORDER BY `service_team` ASC, `serialpriority` ASC
 LIMIT 100
ERROR - 2020-06-11 16:39:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'tbl_ServiceRequest`
WHERE   (
`servicedate` LIKE '2020-06-11%' ESCAPE '!'
 )
AND' at line 1 - Invalid query: SELECT *, (SELECT clientname FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS clientname, (SELECT phone1 FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS phone1, (SELECT COUNT(DISTINCT(clientaccode)) FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid) AS account, (SELECT teamname FROM tbl_ServiceTeam WHERE serviceid = tbl_ServiceRequest.serviceid) AS teamname, (SELECT CONCAT(areaname, " `Rd#"`, roadno) FROM tbl_Clients_Addr WHERE id = (SELECT locationid FROM tbl_ClientAcList WHERE clientaccode = (SELECT clientaccode FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid LIMIT 1) LIMIT 1) LIMIT 1) AS address
FROM `tbl_ServiceRequest`
WHERE   (
`servicedate` LIKE '2020-06-11%' ESCAPE '!'
 )
AND   (
`clientid` LIKE 'R%' ESCAPE '!'
 )
ORDER BY `service_team` ASC, `serialpriority` ASC
 LIMIT 100
ERROR - 2020-06-11 16:40:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'tbl_ServiceRequest`
WHERE   (
`servicedate` LIKE '%' ESCAPE '!'
 )
AND   (
`clie' at line 1 - Invalid query: SELECT *, (SELECT clientname FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS clientname, (SELECT phone1 FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS phone1, (SELECT COUNT(DISTINCT(clientaccode)) FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid) AS account, (SELECT teamname FROM tbl_ServiceTeam WHERE serviceid = tbl_ServiceRequest.serviceid) AS teamname, (SELECT CONCAT(areaname, " `Rd#"`, roadno) FROM tbl_Clients_Addr WHERE id = (SELECT locationid FROM tbl_ClientAcList WHERE clientaccode = (SELECT clientaccode FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid LIMIT 1) LIMIT 1) LIMIT 1) AS address
FROM `tbl_ServiceRequest`
WHERE   (
`servicedate` LIKE '%' ESCAPE '!'
 )
AND   (
`clientid` LIKE 'R%' ESCAPE '!'
 )
ORDER BY `service_team` ASC, `serialpriority` ASC
 LIMIT 100
ERROR - 2020-06-11 16:40:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'tbl_ServiceRequest`
WHERE   (
`servicedate` LIKE '2020-06-11%' ESCAPE '!'
 )
AND' at line 1 - Invalid query: SELECT *, (SELECT clientname FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS clientname, (SELECT phone1 FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS phone1, (SELECT COUNT(DISTINCT(clientaccode)) FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid) AS account, (SELECT teamname FROM tbl_ServiceTeam WHERE serviceid = tbl_ServiceRequest.serviceid) AS teamname, (SELECT CONCAT(areaname, " `Rd#"`, roadno) FROM tbl_Clients_Addr WHERE id = (SELECT locationid FROM tbl_ClientAcList WHERE clientaccode = (SELECT clientaccode FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid LIMIT 1) LIMIT 1) LIMIT 1) AS address
FROM `tbl_ServiceRequest`
WHERE   (
`servicedate` LIKE '2020-06-11%' ESCAPE '!'
 )
AND   (
`clientid` LIKE 'R%' ESCAPE '!'
 )
ORDER BY `service_team` ASC, `serialpriority` ASC
 LIMIT 100
ERROR - 2020-06-11 16:40:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'tbl_ServiceRequest`
WHERE   (
`servicedate` LIKE '%' ESCAPE '!'
 )
AND   (
`clie' at line 1 - Invalid query: SELECT *, (SELECT clientname FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS clientname, (SELECT phone1 FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS phone1, (SELECT COUNT(DISTINCT(clientaccode)) FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid) AS account, (SELECT teamname FROM tbl_ServiceTeam WHERE serviceid = tbl_ServiceRequest.serviceid) AS teamname, (SELECT CONCAT(areaname, " `Rd-"`, roadno) FROM tbl_Clients_Addr WHERE id = (SELECT locationid FROM tbl_ClientAcList WHERE clientaccode = (SELECT clientaccode FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid LIMIT 1) LIMIT 1) LIMIT 1) AS address
FROM `tbl_ServiceRequest`
WHERE   (
`servicedate` LIKE '%' ESCAPE '!'
 )
AND   (
`clientid` LIKE 'R%' ESCAPE '!'
 )
ORDER BY `service_team` ASC, `serialpriority` ASC
 LIMIT 100
ERROR - 2020-06-11 16:40:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'tbl_ServiceRequest`
WHERE   (
`servicedate` LIKE '2020-06-11%' ESCAPE '!'
 )
AND' at line 1 - Invalid query: SELECT *, (SELECT clientname FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS clientname, (SELECT phone1 FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS phone1, (SELECT COUNT(DISTINCT(clientaccode)) FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid) AS account, (SELECT teamname FROM tbl_ServiceTeam WHERE serviceid = tbl_ServiceRequest.serviceid) AS teamname, (SELECT CONCAT(areaname, " `Rd-"`, roadno) FROM tbl_Clients_Addr WHERE id = (SELECT locationid FROM tbl_ClientAcList WHERE clientaccode = (SELECT clientaccode FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid LIMIT 1) LIMIT 1) LIMIT 1) AS address
FROM `tbl_ServiceRequest`
WHERE   (
`servicedate` LIKE '2020-06-11%' ESCAPE '!'
 )
AND   (
`clientid` LIKE 'R%' ESCAPE '!'
 )
ORDER BY `service_team` ASC, `serialpriority` ASC
 LIMIT 100
ERROR - 2020-06-11 16:45:37 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AS address
FROM `tbl_ServiceRequest`
WHERE   (
`servicedate` LIKE '%' ESCAPE '' at line 1 - Invalid query: SELECT *, (SELECT clientname FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS clientname, (SELECT phone1 FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS phone1, (SELECT COUNT(DISTINCT(clientaccode)) FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid) AS account, (SELECT teamname FROM tbl_ServiceTeam WHERE serviceid = tbl_ServiceRequest.serviceid) AS teamname, (SELECT areaname, `landmark`, `roadno`, houseno) FROM tbl_Clients_Addr WHERE id = (SELECT locationid FROM tbl_ClientAcList WHERE clientaccode = (SELECT clientaccode FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid LIMIT 1) LIMIT 1) LIMIT 1) AS address
FROM `tbl_ServiceRequest`
WHERE   (
`servicedate` LIKE '%' ESCAPE '!'
 )
AND   (
`clientid` LIKE 'R%' ESCAPE '!'
 )
ORDER BY `service_team` ASC, `serialpriority` ASC
 LIMIT 100
ERROR - 2020-06-11 16:45:37 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AS address
FROM `tbl_ServiceRequest`
WHERE   (
`servicedate` LIKE '2020-06-11%' at line 1 - Invalid query: SELECT *, (SELECT clientname FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS clientname, (SELECT phone1 FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS phone1, (SELECT COUNT(DISTINCT(clientaccode)) FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid) AS account, (SELECT teamname FROM tbl_ServiceTeam WHERE serviceid = tbl_ServiceRequest.serviceid) AS teamname, (SELECT areaname, `landmark`, `roadno`, houseno) FROM tbl_Clients_Addr WHERE id = (SELECT locationid FROM tbl_ClientAcList WHERE clientaccode = (SELECT clientaccode FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid LIMIT 1) LIMIT 1) LIMIT 1) AS address
FROM `tbl_ServiceRequest`
WHERE   (
`servicedate` LIKE '2020-06-11%' ESCAPE '!'
 )
AND   (
`clientid` LIKE 'R%' ESCAPE '!'
 )
ORDER BY `service_team` ASC, `serialpriority` ASC
 LIMIT 100
ERROR - 2020-06-11 16:46:26 --> Query error: Operand should contain 1 column(s) - Invalid query: SELECT *, (SELECT clientname FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS clientname, (SELECT phone1 FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS phone1, (SELECT COUNT(DISTINCT(clientaccode)) FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid) AS account, (SELECT teamname FROM tbl_ServiceTeam WHERE serviceid = tbl_ServiceRequest.serviceid) AS teamname, (SELECT areaname, `landmark`, `roadno`, houseno FROM tbl_Clients_Addr WHERE id = (SELECT locationid FROM tbl_ClientAcList WHERE clientaccode = (SELECT clientaccode FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid LIMIT 1) LIMIT 1) LIMIT 1) AS address
FROM `tbl_ServiceRequest`
WHERE   (
`servicedate` LIKE '%' ESCAPE '!'
 )
AND   (
`clientid` LIKE 'R%' ESCAPE '!'
 )
ORDER BY `service_team` ASC, `serialpriority` ASC
 LIMIT 100
ERROR - 2020-06-11 16:46:26 --> Query error: Operand should contain 1 column(s) - Invalid query: SELECT *, (SELECT clientname FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS clientname, (SELECT phone1 FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS phone1, (SELECT COUNT(DISTINCT(clientaccode)) FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid) AS account, (SELECT teamname FROM tbl_ServiceTeam WHERE serviceid = tbl_ServiceRequest.serviceid) AS teamname, (SELECT areaname, `landmark`, `roadno`, houseno FROM tbl_Clients_Addr WHERE id = (SELECT locationid FROM tbl_ClientAcList WHERE clientaccode = (SELECT clientaccode FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid LIMIT 1) LIMIT 1) LIMIT 1) AS address
FROM `tbl_ServiceRequest`
WHERE   (
`servicedate` LIKE '2020-06-11%' ESCAPE '!'
 )
AND   (
`clientid` LIKE 'R%' ESCAPE '!'
 )
ORDER BY `service_team` ASC, `serialpriority` ASC
 LIMIT 100
