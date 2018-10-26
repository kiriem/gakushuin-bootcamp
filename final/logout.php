<?php

setcookie("isLogin", "", time()-1);
setcookie("userName", "", time()-1);
setcookie("userMail", "", time()-1);
setcookie("userId", "", time()-1);

header("Location: index.php");