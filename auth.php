
<?php

// Tiempo máximo de inactividad: 30 minutos
// const SESSION_IDLE_TIMEOUT = 1800;
const SESSION_IDLE_TIMEOUT = 1800;

function requireAdmin(): void
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    $authenticated =
        isset($_SESSION['admin_authenticated']) &&
        $_SESSION['admin_authenticated'] === true;

    if (!$authenticated) {
        rejectAdminAccess();
    }

    $now = time();

    $lastActivity = $_SESSION['last_activity'] ?? 0;

    // Comprobar tiempo de inactividad
    if (($now - $lastActivity) >= SESSION_IDLE_TIMEOUT) {

        $_SESSION = [];

        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();

            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }

        session_destroy();

        rejectAdminAccess();
    }

    // Actualizar última actividad
    $_SESSION['last_activity'] = $now;
}

function rejectAdminAccess(): void
{
    $isAjax = strtolower(
        $_SERVER['HTTP_X_REQUESTED_WITH'] ?? ''
    ) === 'xmlhttprequest';

    if ($isAjax) {
        http_response_code(401);
        header('Content-Type: application/json; charset=utf-8');

        echo json_encode([
            'status' => 'error',
            'message' => 'Tu sesión ha expirado por inactividad. Inicia sesión nuevamente.'
        ]);

        exit;
    }

    header('Location: /login');
    exit;
}
