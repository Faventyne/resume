<?php
function getSympathieLabel($friendliness) {
	$sympathieList = getSympathieList();
	if (array_key_exists($friendliness, $sympathieList)) {
		return $sympathieList[$friendliness];
	}
}
function getSympathieList() {
	return array(
		1 => 'Pas sympa',
		2 => 'Assez sympa',
		3 => 'Sympa',
		4 => 'Très sympa',
		5 => 'Génial',
	);
}
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendEmail($to,$subject,$hmtlContent,$textContent=''){
	global $config;

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = $config['MAIL_HOST'];                       // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = $config['MAIL_USERNAME'];                 // SMTP username
        $mail->Password = $config['MAIL_PASSWORD'];
				//print_r($mail->Username);
				//print_r($mail->Password);                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to


        $mail->SMTPOptions = array('ssl' =>
            array('verify_peer'=> false,
                  'verify_peer_name'=>false,
                  'allow_self_signed'=>true)
              );

        //Recipients
        $mail->setFrom('guitchat@gmail.com', 'Guillaume');
        $mail->addAddress($to);     // Add a recipient
                  // Name is optional

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $hmtlContent;
        $mail->AltBody = $textContent;

        $mail->send();
        //echo 'Message has been sent';

    } catch (Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}

function displayExpDates($start,$end){
	$start = str_replace(array(' ', ':'), '-', $start);
	$s    = explode('-', $start);
	$s    = array_pad($s, 6, 0);
	array_walk($s, 'intval');
	$end = str_replace(array(' ', ':'), '-', $end);
	$e    = explode('-', $end);
	$e    = array_pad($e, 6, 0);
	array_walk($e, 'intval');
	$stmp=mktime($s[3], $s[4], $s[5], $s[1], $s[2], $s[0]);
	$etmp=mktime($e[3], $e[4], $e[5], $e[1], $e[2], $e[0]);
	if($stmp>time()){
		return "Will start soon (".date("M y",$stmp) . ")";
	} else {
		if ($etmp>time()){
			return date("M y",$stmp). " - Present";
		} else {
			return date("M y",$stmp). " - ".date("M y",$etmp);
		}

	}
}

function displaySkillLevel($level){
	if($level=="Elementary"){
		echo '<i class="fa fa-star" aria-hidden="true"></i>
		<i class="fa fa-star-o" aria-hidden="true"></i>
		<i class="fa fa-star-o" aria-hidden="true"></i>';
	} elseif ($level=="Professional") {
		echo '<i class="fa fa-star" aria-hidden="true"></i>
		<i class="fa fa-star" aria-hidden="true"></i>
		<i class="fa fa-star-o" aria-hidden="true"></i>';
	} elseif ($level=="Expert") {
		echo '<i class="fa fa-star" aria-hidden="true"></i>
		<i class="fa fa-star" aria-hidden="true"></i>
		<i class="fa fa-star" aria-hidden="true"></i>';
	}

}
