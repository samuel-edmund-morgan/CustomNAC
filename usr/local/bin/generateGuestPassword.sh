#!/bin/bash
password=$(tr -dc A-HJKMNP-Za-hjkmnp-z02-9 </dev/urandom | head -c 6 ; echo '')

#generate password for guest using python
python3 /usr/local/bin/generateGuestPassword.py "$password"

#send tokens to email
php /usr/local/bin/sendGuest.php "$password"
