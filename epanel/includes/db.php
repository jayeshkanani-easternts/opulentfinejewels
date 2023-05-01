<?php
//define(‘USE_PCONNECT’, true);
/* Open Database Connection */
function ets_db_connect($server = DB_SERVER, $username = DB_SERVER_USERNAME, $password = DB_SERVER_PASSWORD,$database = DB_DATABASE, $link = 'db_link') {
    global $$link;

    if (USE_PCONNECT == 'true') { $server = 'p:' . $server;	}

    $$link = mysqli_connect($server, $username, $password, $database);
    if ( !mysqli_connect_errno() ) { mysqli_set_charset($$link, 'utf8'); }
    return $$link;
}

/* Close Database Connection */
function ets_db_close($link = 'db_link') {
    global $$link;
    return mysqli_close($$link);
}

/* Display Query Error */
function ets_db_error($query, $errno, $error) {
    if (defined('STORE_DB_TRANSACTIONS') && (STORE_DB_TRANSACTIONS == 'true')) {
        error_log('ERROR: [' . $errno . '] ' . $error . "\n", 3, STORE_PAGE_PARSE_TIME_LOG);
    }
    die('<div class="well alert alert-danger">' . $query . '</div>');
}

/* Query Database */
function ets_db_query($query, $link = 'db_link') {
    global $$link;

    if (defined('STORE_DB_TRANSACTIONS') && (STORE_DB_TRANSACTIONS == 'true')) {
        error_log('QUERY: ' . $query . "\n", 3, STORE_PAGE_PARSE_TIME_LOG);
    }

    $result = mysqli_query($$link, $query) or ets_db_error($query, mysqli_errno($$link), mysqli_error($$link));

    return $result;
}

/* Perform Insert or Update Query */
function ets_db_perform($table, $data, $action = 'insert', $parameters = '', $link = 'db_link') {
    reset($data);
    if ($action == 'insert') {
        $query = 'insert into ' . $table . ' (';
        while (list($columns, ) = each($data)) {
            $query .= $columns . ', ';
        }
        $query = substr($query, 0, -2) . ') values (';
        reset($data);
        while (list(, $value) = each($data)) {
            switch ((string)$value) {
                case 'now()':
                    $query .= ' \'now()\', ';
                    break;
                case 'null':
                    $query .= 'null, ';
                    break;
                default:
                    $query .= '\'' . ets_db_real_escape_string($value) . '\', ';
                    break;
            }
        }
        $query = substr($query, 0, -2) . ')';
    } elseif ($action == 'update') {
        $query = 'update ' . $table . ' set ';
        while (list($columns, $value) = each($data)) {
            switch ((string)$value) {
                case 'now()':
                    $query .= $columns . ' = \'now()\', ';
                    break;
                case 'null':
                    $query .= $columns .= ' = null, ';
                    break;
                default:
                    $query .= $columns . ' = \'' . ets_db_real_escape_string($value) . '\', ';
                    break;
            }
        }
        $query = substr($query, 0, -2) . ' where ' . $parameters;
    }

    return ets_db_query($query, $link);
}

/* Perform Fetching Array of Query Result */
function ets_db_fetch_array($db_query) {
    return mysqli_fetch_array($db_query, MYSQLI_ASSOC);
}

function ets_db_fetch_assoc($db_query) {
    return mysqli_fetch_assoc($db_query);
}

/* Perform Fetching Arrays of Query Result */
function ets_db_fetch_arrays($db_query) {
    $arr=array();
    while($new=mysqli_fetch_array($db_query, MYSQLI_ASSOC)){
        $arr[]=$new;
    }
    return $arr;
}

/* Return Number of Records in Query Result */
function ets_db_num_rows($db_query) {
    return mysqli_num_rows($db_query);
}

/* Return Specified Row of Query Result */
function ets_db_data_seek($db_query, $row_number) {
    return mysqli_data_seek($db_query, $row_number);
}

/* Return Inserted ID of Query Result */
function ets_db_insert_id($link = 'db_link') {
    global $$link;

    return mysqli_insert_id($$link);
}

/* Free up mysql Query */
function ets_db_free_result($db_query) {
    return mysqli_free_result($db_query);
}

/* Return List of Fields of Query Result */
function ets_db_fetch_fields($db_query) {
    return mysqli_fetch_field($db_query);
}

/* Output result with HTML Characters  */
function ets_db_output($string) {
    return htmlspecialchars($string);
}

/* Applying filters before passing data to mysql server  */
function ets_db_real_escape_string($string, $link = 'db_link') {
    global $$link;

    return mysqli_real_escape_string($$link, $string);
}

/* Applying sanitization before passing data to mysql server  */
function ets_db_prepare_input($string) {
    if (is_string($string)) {
        return trim(tep_sanitize_string(stripslashes($string)));
    } elseif (is_array($string)) {
        reset($string);
        while (list($key, $value) = each($string)) {
            $string[$key] = ets_db_prepare_input($value);
        }
        return $string;
    } else {
        return $string;
    }
}

/* Return affected number of rows of Insert or Update Query Result */
function ets_db_affected_rows($link = 'db_link') {
    global $$link;

    return mysqli_affected_rows($$link);
}

/* Get the database server information */
function ets_db_get_server_info($link = 'db_link') {
    global $$link;

    return mysqli_get_server_info($$link);
}

?>
