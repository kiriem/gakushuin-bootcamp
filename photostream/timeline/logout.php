<?php

setcookie("isLogin", "", time()-1800, "/bootcamp/photostream");
setcookie("userName", "", time()-1800, "/bootcamp/photostream");
setcookie("userMail", "", time()-1800, "/bootcamp/photostream");
setcookie("userId", "", time()-1800, "/bootcamp/photostream");

header("Location: ../index.php");