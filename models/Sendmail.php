<?php

namespace Models;

class Sendmail
{
    public static function sendAcceptMail($email)
    {
        $msg = "Здравствуйте, просим вас не забывать, что ваша бронь действует всего лишь час.\n
                Приятного вам времяпрепровождения";

        mail($email, "Предупреждение", $msg);
    }
}
