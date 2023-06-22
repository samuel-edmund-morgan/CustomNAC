<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    require './vendor/autoload.php';

    $nameEmptyErr = "";
    $nameErr = "";
    $isNameCorrect = FALSE;

    $surnameEmptyErr = "";
    $surnameErr = "";
    $isSurnameCorrect = FALSE;

    $departmentEmptyErr = "";
    $departmentErr = "";
    $isDepartmentCorrect = FALSE;

    $phoneEmptyErr = "";
    $phoneErr = "";
    $isPhoneCorrect = FALSE;

    $loginEmptyErr = "";
    $loginErr = "";
    $loginExistsErr = "";
    $isLoginCorrect = FALSE;

    $passwordEmptyErr = "";
    $passwordErr = "";
    $isPasswordCorrect = FALSE;

    $repasswordEmptyErr = "";
    $repasswordErr = "";
    $isRepasswordCorrect = FALSE;
    $passwordNotMatchErr = "";

    $tokenEmptyErr = "";
    $tokenErr = "";
    $tokenNotExistsErr = "";
    $isTokenExists = FALSE;

    $isDataCorrect = FALSE;
    $DisplayForm = TRUE;
    date_default_timezone_set('Europe/Kyiv');
    $currentDate = date('d.m.Y H:i:s');



    if(isset($_POST["submit"])) {

        $name           = checkInput($_POST["name"]);
        $surname        = checkInput($_POST["surname"]);
        $department     = checkInput($_POST["department"]);
        $phone          = checkInput($_POST["phone"]);
        $login          = checkInput($_POST["login"]);
        $password       = checkInput($_POST["password"]);
        $repassword     = checkInput($_POST["repassword"]);
	$token 		= checkInput($_POST["token"]);

        // Валідація імені (Лише кирилиця)
        if(empty($name)){
            $nameEmptyErr = '<div class="error">
                Введіть будь ласка Ваше ім\'я.
            </div>';
        } // Тільки кирилиця 
        else if(!preg_match("/^[\p{Cyrillic}]+$/u", $name)) {
            $nameErr = '<div class="error">
                Ім\'я можна вводити лише кирилицею
            </div>';
        } else {
            $isNameCorrect = TRUE;
        }


        // Валідація прізвища (Лише кирилиця)
        if(empty($surname)){
            $surnameEmptyErr = '<div class="error">
                Введіть будь ласка Ваше прізвище.
            </div>';
        } // Лише кирилиця 
        else if(!preg_match("/^[\p{Cyrillic}]+$/u", $surname)) {
            $surnameErr = '<div class="error">
                Прізвище можна вводити лише кирилицею
            </div>';
        } else {
            $isSurnameCorrect = TRUE;
        }


        // Валідація підрозділу (Лише кирилиця)
        if(empty($department)){
            $departmentEmptyErr = '<div class="error">
                Введіть будь ласка назву Вашого структурного підрозділу.
            </div>';
        } // Тільки кирилиця 
        else if(!preg_match("/^[0-9 \p{Cyrillic}]+$/u", $department)) {
            $departmentErr = '<div class="error">
                Назву структурного підрозділу можна вводити лише кирилицею. Допустимі пробіли та числа. (Приклади: ВІТ, ЦПП МОД, СК 2)
            </div>';
        } else {
            $isDepartmentCorrect = TRUE;
        } 


        // Валідація телефону (цифри0-9, пробіли , +, -, дужки(), нижнє підкреслювання_)
        if(empty($phone)){
            $phoneEmptyErr = '<div class="error">
                Введіть будь ласка номер телефону, за яким з вами можна зв\'язатись.
            </div>';
        } // Тільки цифри0-9, пробіли , +, -, дужки(), нижнє підкреслювання_
        else if(!preg_match("/^[0-9 \+_\-\(\)]*$/", $phone)) {
            $phoneErr = '<div class="error">
                Введіть коректний номер телефону. Допустимі символи: цифри(0-9), пробіли( ), знак плюс(+), знак мінус(-), дужки(()), нижнє підкреслювання(_). Приклади: +38(044)1111111, 38077 999 99 99, 088_342_3232, 021-432-344-4 і т.д.
            </div>';
        } else {
	    $isPhoneCorrect = TRUE;
        }



        // Валідація імені входу
        if(empty($login)){
            $loginEmptyErr = '<div class="error">
                Ім\'я входу не може бути порожнім.
            </div>';
        } // Тільки латиниця та цифри 
        else if(!preg_match("/^[a-zA-Z0-9_]*$/", $login)) {
            $loginErr = '<div class="error">
                Ім\'я входу можна вводити лише латиницею та цифрами.
            </div>';
        }
	else {
	    $logins_list = fopen("/etc/fortilogins", "r");
	    if($logins_list) {
		while(($line = fgets($logins_list)) !== FALSE) {
			if($line == ($login . "\n")){
				$loginExistsErr = '<div class="error">
                Таке ім`я вже існує в системі. Придумайте інше.
            </div>';
				fclose($logins_list);
				break;
			}
		}
		if(empty($loginExistsErr)){
			$isLoginCorrect = TRUE;
			fclose($logins_list);
		}
	    }
        }




        // Валідація паролю
        if(empty($password)){
            $passwordEmptyErr = '<div class="error">
                Поле паролю не може бути порожнім.
            </div>';
        } // Тільки латиниця та цифри 
        else if(!preg_match("/^[a-zA-Z0-9!@#$%^&*\(\)\-_\+]*$/", $password)) {
            $passwordErr = '<div class="error">
                Пароль може складатись тільки з латиниці та цифр.
            </div>';
        }
        else if($password !== $repassword) {
            $passwordNotMatchErr = '<div class="error">
                Паролі в полях Пароль та Повтор паролю - НЕ однакові.
            </div>';
        } else {
	    $isPasswordCorrect = TRUE;
        }




        // Валідація паролю
        if(empty($repassword)){
            $repasswordEmptyErr = '<div class="error">
                Поле повтору паролю не може бути порожнім.
            </div>';
        } // Тільки латиниця та цифри 
        else if(!preg_match("/^[a-zA-Z0-9!@#$%^&*\(\)\-_\+]*$/", $repassword)) {
            $repasswordErr = '<div class="error">
                Поле повтору паролю може складатись тільки з латиниці та цифр.
            </div>';
        }
        else if($repassword !== $password) {
            $passwordNotMatchErr = '<div class="error">
                Паролі в полях Пароль та Повтор паролю - НЕ однакові.
            </div>';
        } else {
            $isRepasswordCorrect = TRUE;
        }




        // Валідація токену
        if(empty($token)){
            $tokenEmptyErr = '<div class="error">
                Поле Ключ не може бути порожнім.
            </div>';
        } // Тільки латиниця та цифри
        else if(!preg_match("/^[A-Za-z0-9\-]*$/", $token)) {
            $tokenErr = '<div class="error">
                У полі ключа може бути лише латиниця та цифри. Перевірте правильність вводу.
            </div>';
        }
        else {
            $tokens_list = fopen("/etc/fortitokens", "r");
            if($tokens_list) {
                while(($line = fgets($tokens_list)) !== FALSE) {
                        if($line == ($token . "\n")){
				$isTokenExists = TRUE;
                                fclose($tokens_list);
                                break;
                        }
                }
                if(!$isTokenExists){
			$tokenNotExistsErr = '<div class="error">
                                        Такого ключа не існує в системі, або ключ вже був використаний іншим співробітником.
                                </div>';
                }
            }
        }


	$isDataCorrect = ($isNameCorrect && $isSurnameCorrect && $isDepartmentCorrect && $isPhoneCorrect && $isLoginCorrect && $isPasswordCorrect && $isRepasswordCorrect && $isTokenExists);
	if($isDataCorrect){
		$logins_list = fopen("/etc/fortilogins", "a");
                if($logins_list){
                       fwrite($logins_list, $login . "\n");
                       fclose($logins_list);
                }
		echo shell_exec('python3 /usr/local/bin/forti_newuser.py ' . $login . ' ' . $password);


		//Запис всіх  данних користувача разом з токеном
		$data_list = fopen("/etc/fortiuserdata", "a");
                if($data_list){
		       $data = "------------------------------------------------\nName: $name\nSurname: $surname\nDepartment: $department\nPhone: $phone\nLogin: $login\nPassword: $password\nToken: $token\nДата реєстрації: $currentDate\n";
                       fwrite($data_list, $data . "\n");
                       fclose($data_list);
                }

		$data = "\r\nІм'я: $name\r\nПрізвище: $surname\r\nПідрозділ: $department \r\nТелефон: $phone\r\nІм'я входу: $login\r\nПароль: $password\r\nКлюч: $token\r\nДата реєстрації: $currentDate\r\n";
                //Відправка всіх данних на пошту
		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->Encoding = 'base64';
		$mail->CharSet = "UTF-8";
		$mail->SMTPDebug = SMTP::DEBUG_SERVER;
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465;
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
		$mail->SMTPAuth = true;
		$mail->Username = 'academy.ssu.pp.ua@gmail.com';
		$mail->Password = 'fuiptnaqyilnpjvz';
		$mail->setFrom('academy.ssu.pp.ua@gmail.com', 'Адміністратор мережі Академіїї');
		$mail->addReplyTo('academy.ssu.pp.ua@gmail.com', 'Адміністратор мережі Академії');
		$mail->AddAddress('samuel.edmund.morgan@gmail.com', 'Адміністратор пошти');
		$mail->AddAddress('education@ssu.gov.ua', 'Адміністратор пошти');
		$mail->Subject = "$currentDate був зареєстрований новий користувач!";
		$mail->Body    = "$data";
		$mail->SMTPDebug = 0;
		$mail->send();


                //Видалення токену з файлу з токенами
		$contents = file_get_contents("/etc/fortitokens");
		$contents = str_replace($token . "\n", '', $contents);
		file_put_contents("/etc/fortitokens", $contents);

		$name           = "";
        	$surname        = "";
        	$department     = "";
        	$phone          = "";
        	$login          = "";
        	$password       = "";
        	$repassword     = "";
		$token          = "";
		$DisplayForm = False;
	}
    }
    function checkInput($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

?>
