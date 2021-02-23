<?php
defined('BASEPATH') OR exit('No direct script access allowed');


if ( ! function_exists('en2bn')) 
{
	function en2bn($number) 
	{
		$htmlStr = '';
		
		$bangla = array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
		$length = strlen($number);
		
		for($i=0; $i < $length; $i++)
		{
			$change = substr($number, $i, 1);
			
			if($change+0 ==0 && $change != '0') {
				$htmlStr .= $change; 
			}
		
			else {
				$htmlStr .= $bangla[$change];
			}
		}

		return $htmlStr;
	}
}


if ( ! function_exists('encode')) 
{
	function encode($string) 
	{
		$base64 = strtr(base64_encode($string), '+/', '-_');
		
		$count = substr_count($base64, "=");
		
		if($count > 0) {
			$substr = substr($base64, 0, -$count);
			$encoded = $substr.$count;
		}
		
		else {
			$encoded = $base64.'0';
		}
		
		return $encoded;
	}
}


if ( ! function_exists('decode')) 
{
	function decode($string) 
	{
		$count = substr($string, -1);
		
		$substr = substr($string, 0, -1);
		
		if($count > 0) {
			$equal = '';
			
			for($x=0; $x < $count; $x++) {
				$equal .=  '=';
			}
			
			$decoded = base64_decode($substr.$equal);
		}
		
		else {
			$decoded = base64_decode($substr);
		}
		
		return $decoded;
	}
}


if ( ! function_exists('get_LookupList')) 
{
	function get_LookupList($group, $exclude = '')
	{
		$_ci =& get_instance();
		
		$_ci->db->from('lookup as a');
		$_ci->db->where('a.lookup_group', $group);
		
		if($exclude != '') {
			$notin = explode("|", $exclude);
			$_ci->db->where_not_in('a.lookup_value', $notin);
		}	
			
		$_ci->db->order_by('a.lookup_order', 'asc');
		$query = $_ci->db->get();
		
		$htmlStr = sprintf("%s\n", "<option value=\"\"></option>");
		
		foreach($query->result() as $row) {
			$htmlStr .= sprintf("%s\n", "<option value=\"".$row->lookup_value."\">".$row->lookup_label."</option>");
		}
		
		return $htmlStr;
	}
}


if ( ! function_exists('get_LookupListSet')) 
{
	function get_LookupListSet($group, $value, $exclude = '')
	{
		$_ci =& get_instance();
		
		$_ci->db->from('lookup as a');
		$_ci->db->where('a.lookup_group', $group);
		
		if($exclude != '') {
			$notin = explode("|", $exclude);
			$_ci->db->where_not_in('a.lookup_value', $notin);
		}
		
		$_ci->db->order_by('a.lookup_order', 'asc');
		$query = $_ci->db->get();
		
		$htmlStr = sprintf("%s\n", "<option value=\"\"></option>");
		
		foreach($query->result() as $row) {
			if($value == $row->lookup_value) {
				$htmlStr .= sprintf("%s\n", "<option value=\"".$row->lookup_value."\" selected=\"selected\">".$row->lookup_label."</option>");
			} 
			
			else {
				$htmlStr .= sprintf("%s\n", "<option value=\"".$row->lookup_value."\">".$row->lookup_label."</option>");
			}
		}
		
		return $htmlStr;
	}
}


if ( ! function_exists('get_LookupValue')) 
{
	function get_LookupValue($group, $value)
	{
		$_ci =& get_instance();
		
		$_ci->db->from('lookup as a');
		$_ci->db->where('a.lookup_group', $group);
		$_ci->db->where('a.lookup_value', $value);
		$query = $_ci->db->get();
		$data = $query->row_array();
		
		$htmlStr = $data['lookup_label'];
		
		return $htmlStr;
	}
}


if ( ! function_exists('get_NumberList')) 
{
	function get_NumberList($limit, $zero = '')
	{
		$_ci =& get_instance();
		
		$htmlStr = sprintf("%s\n", "<option value=\"\"></option>");
		
		if($zero != '')
			$htmlStr .= sprintf("%s\n", "<option value=\"0\">0</option>");
		
		for($number = 1; $number < $limit; $number++) 
		{ 
			$htmlStr .= sprintf("%s\n", "<option value=\"".$number."\">".$number."</option>");
		}
		
		return $htmlStr;
	}
}


if ( ! function_exists('get_NumberListSet')) 
{
	function get_NumberListSet($limit, $value, $zero = '')
	{
		$_ci =& get_instance();
		
		$htmlStr = sprintf("%s\n", "<option value=\"\"></option>");
		
		if($zero != '') {
			if($value == 0) 
				$htmlStr .= sprintf("%s\n", "<option value=\"0\" selected=\"selected\">0</option>");
				
			else
				$htmlStr .= sprintf("%s\n", "<option value=\"0\">0</option>");
		}
		
		for($number = 1; $number < $limit; $number++) 
		{ 
			if($value == $number) {
				$htmlStr .= sprintf("%s\n", "<option value=\"".$number."\" selected=\"selected\">".$number."</option>");
			} 
			
			else {
				$htmlStr .= sprintf("%s\n", "<option value=\"".$number."\">".$number."</option>");
			}
		}
		
		return $htmlStr;
	}
}


if ( ! function_exists('get_IdformatMethod')) 
{
	function get_IdformatMethod($formatID) 
	{
		$_ci =& get_instance();
		
		$_ci->db->select('a.idformat_method');
		$_ci->db->where('a.idformat_id', $formatID);
		$_ci->db->from('conf_idformat as a');
		$query = $_ci->db->get();
		$data = $query->row_array();
		
		$method = $data['idformat_method'];
		
		return $method;
	}
}


if ( ! function_exists('get_YearList')) 
{
	function get_YearList($start)
	{
		$_ci =& get_instance();
		
		$current_year = date("Y") + 5; 
		$start_year = date("Y") - $start; 
		
		$htmlStr = sprintf("%s\n", "<option value=\"\"></option>");
		
		for($year = $start_year; $year < $current_year; $year++) 
		{ 
			$htmlStr .= sprintf("%s\n", "<option value=\"".$year."\">".$year."</option>");
		}
		
		return $htmlStr;
	}
}


if ( ! function_exists('get_YearListSet')) 
{
	function get_YearListSet($start, $value)
	{
		$_ci =& get_instance();
		
		$current_year = date("Y") + 5; 
		$start_year = date("Y") - $start; 
		
		$htmlStr = sprintf("%s\n", "<option value=\"\"></option>");
		
		for($year = $start_year; $year < $current_year; $year++) 
		{ 
			if($value == $year) {
				$htmlStr .= sprintf("%s\n", "<option value=\"".$year."\" selected=\"selected\">".$year."</option>");
			} 
			
			else {
				$htmlStr .= sprintf("%s\n", "<option value=\"".$year."\">".$year."</option>");
			}
		}
		
		return $htmlStr;
	}
}


if ( ! function_exists('get_YearListC')) 
{
	function get_YearListC($start)
	{
		$_ci =& get_instance();
		
		$current_year = date("Y"); 
		$start_year = date("Y") - $start; 
		
		$htmlStr = sprintf("%s\n", "<option value=\"\"></option>");
		
		for($year = $start_year; $year < $current_year; $year++) 
		{ 
			$htmlStr .= sprintf("%s\n", "<option value=\"".$year."\">".$year."</option>");
		}
		
		return $htmlStr;
	}
}


if ( ! function_exists('get_YearListCSet')) 
{
	function get_YearListCSet($start, $value)
	{
		$_ci =& get_instance();
		
		$current_year = date("Y"); 
		$start_year = date("Y") - $start; 
		
		$htmlStr = sprintf("%s\n", "<option value=\"\"></option>");
		
		for($year = $start_year; $year < $current_year; $year++) 
		{ 
			if($value == $year) {
				$htmlStr .= sprintf("%s\n", "<option value=\"".$year."\" selected=\"selected\">".$year."</option>");
			} 
			
			else {
				$htmlStr .= sprintf("%s\n", "<option value=\"".$year."\">".$year."</option>");
			}
		}
		
		return $htmlStr;
	}
}


if ( ! function_exists('check_date')) 
{
	function check_date($string) 
	{
		$_ci =& get_instance();
		
		$_ci->form_validation->set_message('valid_date', 'The %s field must be entered in YYYY-MM-DD format.');
		
		if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $string)) {
			$arr = explode("-", $string);
			
			$yyyy = $arr[0];
			$mm = $arr[1];
			$dd = $arr[2];
			
			if (is_numeric($yyyy) && is_numeric($mm) && is_numeric($dd)) 
			{
				return checkdate($mm, $dd, $yyyy);
			} 
				
			else {	
				return false;
			}
		}
		
		else {
			return false;
		}
	}
}


if ( ! function_exists('get_Webpage')) 
{
	function get_Webpage($url) 
	{
		$options = array(
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HEADER => false,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_ENCODING => "",
			CURLOPT_USERAGENT => "spider",
			CURLOPT_AUTOREFERER => true,
			CURLOPT_CONNECTTIMEOUT => 120,
			CURLOPT_TIMEOUT => 120,
			CURLOPT_MAXREDIRS => 10,
		);

		$ch = curl_init($url);
		curl_setopt_array($ch,$options);
		$content = curl_exec($ch);
		$err = curl_errno($ch);
		$errmsg = curl_error($ch);
		$header = curl_getinfo($ch);
		curl_close($ch);

		$header['errno'] = $err;
		$header['errmsg'] = $errmsg;
		$header['content'] = $content;
		
		return $header;
	}
}


if ( ! function_exists('get_FileIconByExt')) 
{
	function get_FileIconByExt($fileExt)
	{
		if(in_array($fileExt, array(".doc", ".docx")))
			$fileicon = "fa-file-word-o";
			
		else if(in_array($fileExt, array(".xls", ".xlsx")))
			$fileicon = "fa-file-excel-o";
			
		else if(in_array($fileExt, array(".ppt", ".pptx", ".pps")))
			$fileicon = "fa-file-powerpoint-o";
			
		else if(in_array($fileExt, array(".pdf")))
			$fileicon = "fa-file-pdf-o";
			
		else if(in_array($fileExt, array(".zip", ".rar")))
			$fileicon = "fa-file-archive-o";
			
		else if(in_array($fileExt, array(".jpg", ".png", ".gif")))
			$fileicon = "fa-file-image-o";
			
		else
			$fileicon = "fa-file-o";
			
		return $fileicon;
	}
}


if ( ! function_exists('get_NumberInWord')) 
{
	function get_NumberInWord($num = '')
	{
		$num = (string)((int)$num);
		
		if ((int)($num) && ctype_digit($num))
		{
			$words = array();
			
			$num = str_replace(array(',',' '), '', trim($num));
			
			$list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen');
			
			$list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
			
			$list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion', 'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion', 'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion');
			
			$num_length = strlen($num);
			$levels = (int)(($num_length + 2) / 3);
			$max_length = $levels * 3;
			$num = substr('00'.$num, -$max_length);
			$num_levels = str_split($num, 3);
			
			foreach ($num_levels as $num_part)
			{
				$levels--;
				$hundreds = (int)($num_part / 100);
				$hundreds = ($hundreds ? ' '. $list1[$hundreds].' Hundred'.($hundreds == 1 ? '' : '' ).' ' : '');
				$tens = (int)($num_part % 100);
				$singles = '';
				
				if ($tens < 20) {
					$tens = ($tens ? ' ' . $list1[ $tens ] . ' ' : '');
				}
				
				else {
					$tens = (int)($tens / 10);
					$tens = ' ' . $list2[ $tens ] . ' ';
					$singles = (int)($num_part % 10);
					$singles = ' ' . $list1[ $singles ] . ' ';
				}
				
				$words[ ] = $hundreds . $tens . $singles . (($levels && (int)($num_part)) ? ' ' . $list3[$levels] . ' ' : '');
			}
			
			$commas = count($words);
			
			if ($commas > 1) {
				$commas = $commas - 1;
			}
			
			$words = implode(', ', $words);
			
			$words = trim(str_replace(' ,', ',', trim_all(ucwords($words))), ', ');
			
			if ($commas) {
				$words = replace_last(',', ' and', $words);
			}
			
			return $words;
		}
		
		else if (!((int)$num))
		{
			return 'Zero';
		}
		
		return '';
	}
}


if ( ! function_exists('trim_all')) 
{
	function trim_all($str, $what = NULL, $with = ' ')
	{
		if ($what === NULL) {
			$what = "\\x00-\\x20";
		}
		
		return trim(preg_replace( "/[" . $what . "]+/", $with, $str ), $what);
	}
}


if ( ! function_exists('replace_last')) 
{
	function replace_last($search, $replace, $str)
	{
		if (($pos = strrpos($str, $search)) !== false) {
			$search_length = strlen( $search );
			$str = substr_replace($str, $replace, $pos, $search_length);
		}
		
		return $str;
	}
}


if ( ! function_exists('get_OrgName')) 
{
	function get_OrgName($orgID)
	{
		$_ci =& get_instance();
		
		$_ci->db->from('org_info as a');
		$_ci->db->where('a.org_id', $orgID);
		$query = $_ci->db->get();
		$data = $query->row_array();
		
		$orgname = $data['org_name'];
		
		return $orgname;
	}
}

if ( ! function_exists('DDMMYYYY')) 
{
	function DDMMYYYY($date)
	{
            $d = explode('-', $date);
//		$d = strtotime('d/m/Y',$date);
            if(sizeof($d)>1)
                return "$d[2]-$d[1]-$d[0]";
	}
}

/* End of file common_helper.php */
/* Location: ./app/helpers/common_helper.php */