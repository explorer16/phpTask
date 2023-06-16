<?php

if (!empty($_GET['code'])) {
    // Отправляем код для получения токена (POST-запрос).
    $params = array(
        'client_id'     => '719740179271-5o3rnus7uft8rl9fqvjlougif7qukhdo.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect_uri'  => 'http://localhost/controllers/loginController.php',
        'grant_type'    => 'authorization_code',
        'code'          => $_GET['code']
    );

    $ch = curl_init('https://accounts.google.com/o/oauth2/token');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $data = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($data, true);
    if (!empty($data['access_token'])) {
        // Токен получили, получаем данные пользователя.
        $params = array(
            'access_token' => $data['access_token'],
            'id_token'     => $data['id_token'],
            'token_type'   => 'Bearer',
            'expires_in'   => 3599
        );

        $info = file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo?' . urldecode(http_build_query($params)));
        $info = json_decode($info, true);

        setcookie('name', $info['name'], time()+1800, "/");
        setcookie('email', $info['email'], time()+1800, "/");

        header('Location: /main');
    }
} else {
    $params = array(
        'client_id'     => '719740179271-5o3rnus7uft8rl9fqvjlougif7qukhdo.apps.googleusercontent.com',
        'redirect_uri'  => 'http://localhost/controllers/loginController.php',
        'response_type' => 'code',
        'scope'         => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile',
        'state'         => '123'
    );

    $url = 'https://accounts.google.com/o/oauth2/auth?' . urldecode(http_build_query($params));
    header('Location: '.$url);
    //echo '<a href="' . $url . '">Авторизация через Google</a>';
}
