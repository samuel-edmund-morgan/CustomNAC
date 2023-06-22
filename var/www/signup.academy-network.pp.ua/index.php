<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Академія СБУ: Реєстрація в системі</title>
  <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/academy.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body onload="  ">
<script>
	//setInterval(openUrl, 2000);
        // https://developer.mozilla.org/en-US/docs/Web/API/URLSearchParams
        //grab params from query string
        const urlParams = new URLSearchParams(window.location.search);
        const postParam = urlParams.get('post');
        const magicParam = urlParams.get('magic');

        window.onload = function() {

                // set action URL
        document.authlogin.action = get_action();
                // put post URL into callback URL box
                document.getElementById("callbackurl").value = postParam;
                document.getElementById("magic").value = magicParam;

    }

    function get_action() {
        return postParam;
    }

</script>
  <div class="screen_size" style="position:fixed; display:none;   z-index:1; padding:5px;">
			<div class="visible-xs">XS</div>
			<div class="visible-sm">SM</div>
			<div class="visible-md">MD</div>
			<div class="visible-lg">LG</div>
  </div>
  <img style="display:none;" src="/assets/logo.png" alt="Національна академія Служби Безпеки України logo">
  <div style="width:100%;">
  	<div class="head">
		<div class "page" style=" padding:0px 0px 0px;">
			<div class="head_content ">
				<div class="head_content_text col-lg-5 col-md-6 col-sm-8 col-xs-8"> 
					<a href="/" class=""><img src="assets/logo.png" class="logo" alt="Національна академія Служби Безпеки України logo"></a>
					<div class="spacer visible-md"></div>   
					<div class="spacer hidden-xs"></div>   
					<div class="spacer_half hidden-xs hidden-sm"></div>   
					<h2 class="hidden-xs hidden-sm" style="cursor:pointer;" onclick="document.location.href=&quot;//&quot;">Національна академія Служби Безпеки України</h2>  
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear visible-xs"></div>
		<div class="clear"></div>
	</div>
                   
<div class="menu  " style="padding:0px;">
<div class="page">
<div class="menu_content">
<div class="hidden-xs hidden-sm">
<ul class="menu_desktop ">
<li><a href="http://gstatic.com/generate_204">Вхід<svg class="head-navigation-arrow" aria-hidden="true" viewBox="0 0 6 3">
</svg></a></li>

<li><a href="index.php" onclick="location.href=this.href+'?login&post='+postParam+'&magic='+magicParam;return false;">Реєстрація<svg class="head-navigation-arrow" aria-hidden="true" viewBox="0 0 6 3">
</svg></a></li>

</ul> 
</div>
</div>
</div>
</div>


                   
  </div>
  <?php
   include('form_validation.php');
   if ($DisplayForm){
   ?>
  <div class="containerForm mt-5">
    <h2 class="text-center mb-4">Реєстрація нового користувача</h2>
    <!-- Form validation script -->
    <!-- Contact form -->
    <form action="" method="post" novalidate>


      <div class="form-group row">
        <label class="col-sm-4 col-form-label">
	<p><b>Ім'я</b><br/><i style="font-size:12.5px;">(Тільки кирилиця. Поле не може бути порожнім)</i></p>
	</label>
	<div class="col-sm-8">
          <input type="text" name="name" class="form-control" placeholder="Степан" value="<?php echo $name; ?>">
          <!-- Error -->
          <?php echo $nameEmptyErr; ?>
          <?php echo $nameErr; ?>
        </div>
      </div>


      <div class="form-group row">
        <label class="col-sm-4 col-form-label"><b>Прізвище</b><br/><i style="font-size:12.5px;">(Тільки кирилиця. Поле не може бути порожнім)</i></label>
        <div class="col-sm-8">
          <input type="text" name="surname" class="form-control" placeholder="Бандера" value="<?php echo $surname; ?>" >
          <!-- Error -->
          <?php echo $surnameEmptyErr; ?>
          <?php echo $surnameErr; ?>
        </div>
      </div>


      <div class="form-group row">
        <label class="col-sm-4 col-form-label"><b>Підрозділ</b><br/><i style="font-size:12.5px;">(Тільки кирилиця, цифри та пробіли. Поле не може бути порожнім)</i></label>
        <div class="col-sm-8">
          <input type="text" name="department" class="form-control"  placeholder="ОУН" value="<?php echo $department; ?>">
          <!-- Error -->
          <?php echo $departmentEmptyErr; ?>
          <?php echo $departmentErr; ?>
        </div>
      </div>


      <div class="form-group row">
        <label class="col-sm-4 col-form-label"><b>Номер телефону</b><br/><i style="font-size:12.5px;">(У зручному для Вас форматі. Поле не може бути порожнім)</i></label>
        <div class="col-sm-8">
          <input type="text" name="phone" class="form-control"  placeholder="+38(066)-666-66-66" value="<?php echo $phone; ?>">
          <!-- Error -->
          <?php echo $phoneEmptyErr; ?>
          <?php echo $phoneErr; ?>
        </div>
      </div>      


      <div class="form-group row">
        <label class="col-sm-4 col-form-label"><b>Бажане ім'я входу</b><br/><i style="font-size:12.5px;">(Тільки латиниця, цифри та нижнє підкреслювання. Поле не може бути порожнім)</i></label>
        <div class="col-sm-8">
          <input type="text" name="login" class="form-control"  placeholder="moscalyaku_na_gillyaku" value="<?php echo $login; ?>">
          <!-- Error -->
          <?php echo $loginEmptyErr; ?>
          <?php echo $loginErr; ?>
	  <?php echo $loginExistsErr; ?>
        </div>
      </div> 


      <div class="form-group row">
        <label class="col-sm-4 col-form-label"><b>Пароль</b><br/><i style="font-size:12.5px;">(Тільки латиниця, цифри та спеціальні символи. Поле не може бути порожнім та має бути однаковим з полем "Повтор паролю")</i></label>
        <div class="col-sm-8">
          <input type="password" name="password" class="form-control"  placeholder="1488bAnderivEts69">
          <!-- Error -->
          <?php echo $passwordNotMatchErr; ?>
          <?php echo $passwordEmptyErr; ?>
          <?php echo $passwordErr; ?>
        </div>
      </div> 


      <div class="form-group row">
        <label class="col-sm-4 col-form-label"><b>Повтор паролю</b><br/><i style="font-size:12.5px;">(Тільки латиниця, цифри та спеціальні символи. Поле не може бути порожнім та має бути однаковим з полем "Пароль")</i></label>
        <div class="col-sm-8">
          <input type="password" name="repassword" class="form-control" placeholder="1488bAnderivEts69">
          <!-- Error -->
          <?php echo $passwordNotMatchErr; ?>
          <?php echo $repasswordEmptyErr; ?>
          <?php echo $repasswordErr; ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-4 col-form-label" style="text-align:left;"><b>Ключ</b><br/><i style="font-size:12.5px;">(Особистий ключ для реєстрації треба отримати в 236 кабінеті)</i></label>
        <div class="col-sm-8">
          <input type="text" name="token" class="form-control"  placeholder="NJdR-76gD-PDye-9RdE" value="<?php echo $token; ?>">
          <!-- Error -->
          <?php echo $tokenEmptyErr; ?>
          <?php echo $tokenErr; ?>
	  <?php echo $tokenNotExistsErr; ?>
        </div>
      </div>





      <div class="form-group row">
        <div class="col-sm-12 mt-3">
          <button type="submit" name="submit" class="btn btn_color btn-primary btn-block">Зареєструватись</button>
        </div>
      </div>



    </form>
  </div>
    <?php
	}
	else {
    ?>
 <div class="containerForm mt-5">
    <h2 class="text-center mb-4">Реєстрація нового користувача</h2>
    <form action="" method="post" novalidate>
	<div class="text-center">
	  <img src="assets/success.png" class="rounded" alt="..." width="200" height="200">
	</div>
	<h3 class="text-center mb-4">Дякуємо за реєстрацію!</h3>
	<p class="text-center mb-4" style="font-size:18px;"><i> Тепер ви можете перейти на сторінку входу, для отримання доступу до мережі Інтернет</i></p>
	<div class="form-group row">
        <div class="col-sm-12 mt-3">
        <a href="http://gstatic.com/generate_204" class="btn btn_color btn-primary btn-block">Вхід</a>
        </div>
        </div>
    </form>
 </div>
    <?php
        }
    ?>
  
</body>
</html>
