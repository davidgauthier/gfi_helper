<?php
// src/AppBundle/Twig/AppExtension.php
namespace AppBundle\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('displayCount', [$this, 'displayCountFilter'], ['is_safe' => ['html']]),
        ];
    }

    public function displayCountFilter($nb, array $options = [])
    {
        // Le texte simple
        if($nb > 1){
            $res = $nb . ' réservations';
        } else{
            $res = $nb . ' réservation';
        }

        // On va determiner la couleur souhaitée
        if(isset($options['monthly']) && $options['monthly'] === true){
            if($nb >= 70){
                $badgeColor = 'danger';
            } elseif ($nb >= 45){
                $badgeColor = 'warning';
            } elseif ($nb >= 20){
                $badgeColor = 'primary';
            } else{
                $badgeColor = 'light';
            }
        } else{
            if($nb >= 8){
                $badgeColor = 'danger';
            } elseif ($nb >= 4){
                $badgeColor = 'warning';
            } elseif ($nb >= 1){
                $badgeColor = 'primary';
            } else{
                $badgeColor = 'light';
            }
        }

        // Si l'option 'badge' est renseignée, c'est qu'on désire un badge simple
        if(isset($options['badge']) && $options['badge'] === true){
            $template = '<span class="badge badge-%s">%s</span>';
            $res = sprintf($template, $badgeColor, $res);
        }
        // Sinon si l'option 'url' est renseignée, c'est qu'on désire un badge cliquable (lien)
        elseif(isset($options['src']) && !empty($options['src'])){

            if(isset($options['monthly']) && $options['monthly'] === true){
                $template = '<a href="%s" class="badge badge-%s" title="%s">%s</a>';
                $res = sprintf($template, $options['src'], $badgeColor, $res, $res);
            }
            else{
                $template = '<a href="%s" class="badge badge-%s %s" title="%s">%s</a>';
                // Si l'option 'class' est renseignée et vaut link_reservations_room_date
                if(isset($options['class']) && $options['class'] === 'link_reservations_room_date'){
                    $class = 'link_reservations_room_date';
                    $span = '<span>'.$res.'</span>';
                }
                elseif (isset($options['class']) && $options['class'] === 'link_reservations_room_date_icon'){
                    $class = 'link_reservations_room_date_icon';
                    $span = '<span>'.$nb.' <i class="fas fa-clipboard-list"></i></span>';
                }

                $res = sprintf($template, $options['src'], $badgeColor, $class, $res, $span);
            }

        }

        return $res;
    }
}