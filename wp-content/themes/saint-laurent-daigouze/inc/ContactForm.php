<?php

namespace inc;

if (!session_id()) {
    session_start();
}

class ContactForm
{
    public function __construct($data)
    {
        // Uncomment for polylang support
        // switch_to_locale($data['lang']);

        $_SESSION['errors'] = [];
        $_SESSION['old'] = [];
        $_SESSION['feedback'] = '';

        $rules = [
            "name" => ['required'],
            "lastname" => ['required'],
            "email" => ['required', 'email'],
            "phone" => [],
            "subject" => ['required'],
            "message" => ['required'],
        ];

        self::validate($data, $rules);

        if (count($_SESSION['errors']) > 0) {
            $_SESSION['old'] = $data;
        } else {
            $_SESSION['feedback'] = __("Merci ! Votre message a bien été envoyé :)");
            self::sendMail($data);
        }

        wp_redirect(wp_get_referer());
        exit();
    }

    protected static function validate(array $data, array $rules): void
    {
        foreach ($rules as $field => $checks) {

            $key = $field ?? null;

            foreach ($checks as $check) {
                $method = $check;

                self::$method($key, $data);
            }
        }
    }

    public static function feedback(): string
    {
        $feedback = $_SESSION['feedback'] ?? '';

        unset($_SESSION['feedback']);

        return $feedback;
    }

    private static function required(string $key, array $data): bool
    {
        if (empty($data[$key])) {
            $_SESSION['errors'][$key] = __("Ce champ est requis", 'dw');
            return false;
        }

        return true;
    }

    private static function email(string $key, array $data): bool
    {
        if (!filter_var($data[$key], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['errors'][$key] = __("L'adresse mail n'est pas valide");
            return false;
        }
        return true;
    }

    private static function sendMail(array $data): void
    {
        $headers[] = "From {$data['name']} {$data['lastname']}: {$data['email']}";
        $headers[] = "Reply-To: {$data['email']}";

        $subject = $data['subject'];

        wp_mail(get_bloginfo('admin_email'), $subject, $data['message'], $headers);
    }
}