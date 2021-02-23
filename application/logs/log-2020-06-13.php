<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-06-13 11:03:16 --> Severity: Notice --> Undefined index: HTTP_REFERER /var/www/html/hydrokleen/v2/application/controllers/crm/Client.php 31
ERROR - 2020-06-13 11:12:54 --> Severity: Warning --> explode() expects parameter 2 to be string, array given /var/www/html/hydrokleen/v2/system/database/DB_query_builder.php 1232
ERROR - 2020-06-13 11:12:54 --> Severity: Warning --> Invalid argument supplied for foreach() /var/www/html/hydrokleen/v2/system/database/DB_query_builder.php 1232
ERROR - 2020-06-13 11:13:23 --> Severity: Warning --> explode() expects parameter 2 to be string, array given /var/www/html/hydrokleen/v2/system/database/DB_query_builder.php 1232
ERROR - 2020-06-13 11:13:23 --> Severity: Warning --> Invalid argument supplied for foreach() /var/www/html/hydrokleen/v2/system/database/DB_query_builder.php 1232
ERROR - 2020-06-13 11:22:12 --> Severity: Notice --> Undefined index: name /var/www/html/hydrokleen/v2/application/views/view_container.php 244
ERROR - 2020-06-13 11:22:12 --> Severity: Notice --> Undefined index: name /var/www/html/hydrokleen/v2/application/views/view_container.php 279
ERROR - 2020-06-13 12:00:40 --> Severity: Notice --> Undefined index: servicetypeid /var/www/html/hydrokleen/v2/application/models/Model_Admin.php 81
ERROR - 2020-06-13 13:10:43 --> Severity: Notice --> Undefined variable: data /var/www/html/hydrokleen/v2/application/views/service/view_service_dailyorganize.php 47
ERROR - 2020-06-13 18:37:08 --> Severity: Notice --> Undefined index: teamnid /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 42
ERROR - 2020-06-13 18:37:08 --> Severity: Notice --> Undefined index: teamnid /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 42
ERROR - 2020-06-13 18:37:08 --> Severity: Notice --> Undefined index: teamnid /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 42
ERROR - 2020-06-13 18:37:31 --> Severity: Notice --> Undefined index: teamnid /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 42
ERROR - 2020-06-13 18:37:31 --> Severity: Notice --> Undefined index: teamnid /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 42
ERROR - 2020-06-13 18:37:31 --> Severity: Notice --> Undefined index: teamnid /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 42
ERROR - 2020-06-13 18:58:42 --> Severity: error --> Exception: /var/www/html/hydrokleen/v2/application/models/Model_Service.php exists, but doesn't declare class Model_Service /var/www/html/hydrokleen/v2/system/core/Loader.php 340
ERROR - 2020-06-13 19:00:59 --> Severity: Warning --> mysqli::query(): (21000/1242): Subquery returns more than 1 row /var/www/html/hydrokleen/v2/system/database/drivers/mysqli/mysqli_driver.php 307
ERROR - 2020-06-13 19:00:59 --> Query error: Subquery returns more than 1 row - Invalid query: SELECT *, (SELECT clientname FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS clientname, (SELECT phone1 FROM tbl_Clients WHERE clientid = tbl_ServiceRequest.clientid) AS phone1, (SELECT COUNT(DISTINCT(clientaccode)) FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid) AS account, (SELECT teamname FROM tbl_ServiceTeam WHERE serviceid = tbl_ServiceRequest.serviceid) AS teamname, (SELECT roadno FROM tbl_Clients_Addr WHERE id = (SELECT locationid FROM tbl_ClientAcList WHERE clientaccode = (SELECT clientaccode FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid LIMIT 1) LIMIT 1) LIMIT 1) AS roadno, (SELECT houseno FROM tbl_Clients_Addr WHERE id = (SELECT locationid FROM tbl_ClientAcList WHERE clientaccode = (SELECT clientaccode FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid LIMIT 1) LIMIT 1) LIMIT 1) AS houseno, (SELECT block FROM tbl_Clients_Addr WHERE id = (SELECT locationid FROM tbl_ClientAcList WHERE clientaccode = (SELECT clientaccode FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid LIMIT 1) LIMIT 1) LIMIT 1) AS block, (SELECT section FROM tbl_Clients_Addr WHERE id = (SELECT locationid FROM tbl_ClientAcList WHERE clientaccode = (SELECT clientaccode FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid LIMIT 1) LIMIT 1) LIMIT 1) AS section, (SELECT areaname FROM tbl_Clients_Addr WHERE id = (SELECT locationid FROM tbl_ClientAcList WHERE clientaccode = (SELECT clientaccode FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid LIMIT 1) LIMIT 1) LIMIT 1) AS areaname, (SELECT landmark FROM tbl_Clients_Addr WHERE id = (SELECT locationid FROM tbl_ClientAcList WHERE clientaccode = (SELECT clientaccode FROM tbl_ServiceRequestItems WHERE serviceid = tbl_ServiceRequest.serviceid LIMIT 1) LIMIT 1) LIMIT 1) AS landmark, (SELECT vehicleid FROM tbl_ServiceTeam WHERE serviceid = serviceid) AS landmark
FROM `tbl_ServiceRequest`
WHERE `servicedate` = '2020-06-12'
ORDER BY `service_team` ASC, `serialpriority` ASC
ERROR - 2020-06-13 19:04:58 --> Severity: Notice --> Undefined index: teamid /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 5
ERROR - 2020-06-13 19:04:58 --> Severity: Notice --> Undefined index: teamid /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 5
ERROR - 2020-06-13 19:04:58 --> Severity: Notice --> Undefined index: teamid /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 5
ERROR - 2020-06-13 19:04:58 --> Severity: Notice --> Undefined index: teamid /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 5
ERROR - 2020-06-13 19:04:58 --> Severity: Notice --> Undefined index: teamid /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 5
ERROR - 2020-06-13 19:04:58 --> Severity: Notice --> Undefined index: teamid /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 5
ERROR - 2020-06-13 19:04:58 --> Severity: Notice --> Undefined index: teamid /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 5
ERROR - 2020-06-13 19:04:58 --> Severity: Notice --> Undefined index: teamid /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 5
ERROR - 2020-06-13 19:04:58 --> Severity: Notice --> Undefined index: teamid /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 5
ERROR - 2020-06-13 19:04:58 --> Severity: Notice --> Undefined index: teamid /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 5
ERROR - 2020-06-13 19:04:58 --> Severity: Notice --> Undefined index: teamid /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 5
ERROR - 2020-06-13 19:04:58 --> Severity: Notice --> Undefined index: teamid /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 5
ERROR - 2020-06-13 19:04:58 --> Severity: Notice --> Undefined index: teamid /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 5
ERROR - 2020-06-13 19:04:58 --> Severity: Notice --> Undefined index: teamid /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 5
ERROR - 2020-06-13 19:04:58 --> Severity: Notice --> Undefined index: teamid /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 5
ERROR - 2020-06-13 19:04:58 --> Severity: Notice --> Undefined index: teamid /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 5
ERROR - 2020-06-13 19:04:58 --> Severity: Notice --> Undefined index: teamid /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 5
ERROR - 2020-06-13 19:04:58 --> Severity: Notice --> Undefined index: teamid /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 5
ERROR - 2020-06-13 19:04:58 --> Severity: Notice --> Undefined index: teamid /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 5
ERROR - 2020-06-13 19:04:58 --> Severity: Notice --> Undefined index: teamid /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 5
ERROR - 2020-06-13 19:04:58 --> Severity: Notice --> Undefined index: teamid /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 5
ERROR - 2020-06-13 19:04:58 --> Severity: Notice --> Undefined index: teamid /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 5
ERROR - 2020-06-13 19:04:58 --> Severity: Notice --> Undefined index: teamid /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 5
ERROR - 2020-06-13 19:04:58 --> Severity: Notice --> Undefined index: teamid /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 5
ERROR - 2020-06-13 19:05:49 --> Severity: Notice --> Undefined variable: staffs /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 48
ERROR - 2020-06-13 19:05:49 --> Severity: Warning --> Invalid argument supplied for foreach() /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 48
ERROR - 2020-06-13 19:05:49 --> Severity: Notice --> Undefined variable: staffs /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 56
ERROR - 2020-06-13 19:05:49 --> Severity: Warning --> Invalid argument supplied for foreach() /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 56
ERROR - 2020-06-13 19:05:49 --> Severity: Notice --> Undefined variable: staffs /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 64
ERROR - 2020-06-13 19:05:49 --> Severity: Warning --> Invalid argument supplied for foreach() /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 64
ERROR - 2020-06-13 19:05:49 --> Severity: Notice --> Undefined variable: staffs /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 72
ERROR - 2020-06-13 19:05:49 --> Severity: Warning --> Invalid argument supplied for foreach() /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 72
ERROR - 2020-06-13 19:05:49 --> Severity: Notice --> Undefined variable: staffs /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 80
ERROR - 2020-06-13 19:05:49 --> Severity: Warning --> Invalid argument supplied for foreach() /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 80
ERROR - 2020-06-13 19:05:49 --> Severity: Notice --> Undefined variable: staffs /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 48
ERROR - 2020-06-13 19:05:49 --> Severity: Warning --> Invalid argument supplied for foreach() /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 48
ERROR - 2020-06-13 19:05:49 --> Severity: Notice --> Undefined variable: staffs /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 56
ERROR - 2020-06-13 19:05:49 --> Severity: Warning --> Invalid argument supplied for foreach() /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 56
ERROR - 2020-06-13 19:05:49 --> Severity: Notice --> Undefined variable: staffs /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 64
ERROR - 2020-06-13 19:05:49 --> Severity: Warning --> Invalid argument supplied for foreach() /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 64
ERROR - 2020-06-13 19:05:49 --> Severity: Notice --> Undefined variable: staffs /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 72
ERROR - 2020-06-13 19:05:49 --> Severity: Warning --> Invalid argument supplied for foreach() /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 72
ERROR - 2020-06-13 19:05:49 --> Severity: Notice --> Undefined variable: staffs /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 80
ERROR - 2020-06-13 19:05:49 --> Severity: Warning --> Invalid argument supplied for foreach() /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 80
ERROR - 2020-06-13 19:05:49 --> Severity: Notice --> Undefined variable: staffs /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 48
ERROR - 2020-06-13 19:05:49 --> Severity: Warning --> Invalid argument supplied for foreach() /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 48
ERROR - 2020-06-13 19:05:49 --> Severity: Notice --> Undefined variable: staffs /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 56
ERROR - 2020-06-13 19:05:49 --> Severity: Warning --> Invalid argument supplied for foreach() /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 56
ERROR - 2020-06-13 19:05:49 --> Severity: Notice --> Undefined variable: staffs /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 64
ERROR - 2020-06-13 19:05:49 --> Severity: Warning --> Invalid argument supplied for foreach() /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 64
ERROR - 2020-06-13 19:05:49 --> Severity: Notice --> Undefined variable: staffs /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 72
ERROR - 2020-06-13 19:05:49 --> Severity: Warning --> Invalid argument supplied for foreach() /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 72
ERROR - 2020-06-13 19:05:49 --> Severity: Notice --> Undefined variable: staffs /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 80
ERROR - 2020-06-13 19:05:49 --> Severity: Warning --> Invalid argument supplied for foreach() /var/www/html/hydrokleen/v2/application/views/modal/view_modal_manage_team.php 80
