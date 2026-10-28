<?php

function requireAdmin(): void
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    $authenticated =
        isset($_SESSION['admin_authenticated']) &&
        $_SESSION['admin_authenticated'] === true;

    if (!$authenticated) {
        // Responder correctamente a solicitudes AJAX.
        $isAjax = strtolower(
            $_SERVER['HTTP_X_REQUESTED_WITH'] ?? ''
        ) === 'xmlhttprequest';

        if ($isAjax) {
            http_response_code(401);
            header('Content-Type: application/json; charset=utf-8');

            echo json_encode([
                'status' => 'error',
                'message' => 'Tu sesión ha expirado. Inicia sesión nuevamente.'
            ]);

            exit;
        }

        // Acceso directo desde el navegador.
        header('Location: /login');
        exit;
    }
}
