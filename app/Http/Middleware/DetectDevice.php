<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Middleware para detectar el tipo de dispositivo y asignar el layout correspondiente
 * 
 * @author Eze Chavez
 */
class DetectDevice
{
    /**
     * Lista de palabras clave para detectar dispositivos móviles
     */
    protected $mobileKeywords = [
        'Mobile', 'Android', 'iPhone', 'iPad', 'Windows Phone',
        'webOS', 'BlackBerry', 'iPod', 'Opera Mini', 'IEMobile'
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $userAgent = $request->header('User-Agent');
        $isMobile = false;

        // Detectar si es un dispositivo móvil
        foreach ($this->mobileKeywords as $keyword) {
            if (stripos($userAgent, $keyword) !== false) {
                $isMobile = true;
                break;
            }
        }

        // Asignar el layout correspondiente
        view()->share('layout', $isMobile ? 'layouts.mobile' : 'layouts.desktop');

        return $next($request);
    }
} 