<?php

use Modules\Support\Contracts\V1\Numerify\Numerify;
use Modules\Support\Services\V1\Swal\Swal;
use Modules\Support\Services\V1\VariableBuilder\VariableBuilder;
use Modules\User\Entities\V1\User\UserFields;

if (!function_exists('disk'))
{
    /**
     * Get the default disk name
     *
     * @return string
     */
    function disk(): string
    {
        return config('filesystems.default');
    }
}

if (!function_exists('domain'))
{
    /**
     * Get the domain address
     *
     * @param string $domain
     *
     * @return string
     */
    function domain(string $sign): string
    {
        return $sign . env('SESSION_DOMAIN');
    }
}

if (!function_exists('v1_persianify'))
{
    /**
     * Get the persian-numerified version of a text
     *
     * @param string $needle
     *
     * @return string
     */
    function v1_persianify(string $needle): string
    {
        $persianDigits = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $englishDigits = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        return str_replace($persianDigits, $englishDigits, $needle);
    }
}

if (!function_exists('v1_numerify'))
{
    /**
     * Resolve the numerify service
     *
     * @return Numerify
     */
    function v1_numerify(): Numerify
    {
        return resolve(Numerify::class);
    }
}

if (!function_exists('v1_swal'))
{
    /**
     * Resolve the swal service
     *
     * @return Swal
     */
    function v1_swal(): Swal
    {
        return new Swal;
    }
}

if (!function_exists('v1_variable'))
{
    /**
     * Resolve the VariableBuilder service
     *
     * @return VariableBuilder
     */
    function v1_variable(): VariableBuilder
    {
        return new VariableBuilder;
    }
}

if (!function_exists('gravatar'))
{
    /**
     * Generate the gravatar profile image URL
     *
     * @param mixed|null $target
     * @param int        $size
     * @param string     $default_image
     * @param string     $rating
     *
     * @return string
     */
    function gravatar(mixed $target = null, int $size = 128, string $default_image = 'identicon', string $rating = 'g'): string
    {
        $_user = v1_user()->model();

        if (!$target && auth()->check())
            $target = auth()->user()->{UserFields::EMAIL} ?? auth()->user()->{UserFields::MOBILE};
        else if ($target instanceof $_user)
            $target = $target->{UserFields::EMAIL} ?? $target->{UserFields::MOBILE};
        else if (is_string($target))
            $target = strtolower($target);
        else
            $target = time() . '-i-am-panicked';

        $hash = md5(strtolower(trim($target)));
        return "https://www.gravatar.com/avatar/$hash?s=$size&d=$default_image&r=$rating";
    }
}

