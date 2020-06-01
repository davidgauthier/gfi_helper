<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use AppBundle\Entity\Reservation;

class LoadReservationData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager){

        $today                      = new \Datetime();
        $nxtMonday                  = new \Datetime();
        $nxtTuesday                 = new \Datetime();
        $nxtWednesday               = new \Datetime();
        $nxtThursday                = new \Datetime();
        $nxtFriday                  = new \Datetime();
        $nxtMondayPlusSeven         = new \Datetime();
        $nxtTuesdayPlusSeven        = new \Datetime();
        $nxtWednesdayPlusSeven      = new \Datetime();
        $nxtThursdayPlusSeven       = new \Datetime();
        $nxtFridayPlusSeven         = new \Datetime();
        $nxtMondayPlusFourteen      = new \Datetime();
        $nxtTuesdayPlusFourteen     = new \Datetime();
        $nxtWednesdayPlusFourteen   = new \Datetime();
        $nxtThursdayPlusFourteen    = new \Datetime();
        $nxtFridayPlusFourteen      = new \Datetime();
        $nxtMondayPlusTwentyOne     = new \Datetime();
        $nxtTuesdayPlusTwentyOne    = new \Datetime();
        $nxtWednesdayPlusTwentyOne  = new \Datetime();
        $nxtThursdayPlusTwentyOne   = new \Datetime();
        $nxtFridayPlusTwentyOne     = new \Datetime();
        $nxtMonday->modify('next Monday');
        $nxtTuesday->modify('next Tuesday');
        $nxtWednesday->modify('next Wednesday');
        $nxtThursday->modify('next Thursday');
        $nxtFriday->modify('next Friday');
        $nxtMondayPlusSeven->modify('next Monday')->modify('+7 days');
        $nxtTuesdayPlusSeven->modify('next Tuesday')->modify('+7 days');
        $nxtWednesdayPlusSeven->modify('next Wednesday')->modify('+7 days');
        $nxtThursdayPlusSeven->modify('next Thursday')->modify('+7 days');
        $nxtFridayPlusSeven->modify('next Friday')->modify('+7 days');
        $nxtMondayPlusFourteen->modify('next Monday')->modify('+14 days');
        $nxtTuesdayPlusFourteen->modify('next Tuesday')->modify('+14 days');
        $nxtWednesdayPlusFourteen->modify('next Wednesday')->modify('+14 days');
        $nxtThursdayPlusFourteen->modify('next Thursday')->modify('+14 days');
        $nxtFridayPlusFourteen->modify('next Friday')->modify('+14 days');
        $nxtMondayPlusTwentyOne->modify('next Monday')->modify('+21 days');
        $nxtTuesdayPlusTwentyOne->modify('next Tuesday')->modify('+21 days');
        $nxtWednesdayPlusTwentyOne->modify('next Wednesday')->modify('+21 days');
        $nxtThursdayPlusTwentyOne->modify('next Thursday')->modify('+21 days');
        $nxtFridayPlusTwentyOne->modify('next Friday')->modify('+21 days');

        $reservations = array(
            // ========== Reservations pour aujourd'hui ==================================================
            // ==================== Salle 0 (Salle du 5ème) ==============================================
            [
                'user'      => $this->getReference('user-1'),
                'room'      => $this->getReference('room-0'),
                'date'      => $today,
                'timeBegin' => new \DateTime('08:30:00'),
                'timeEnd'   => new \DateTime('09:00:00'),
                'comment'   => 'On est matinal',
            ],
            [
                'user'      => $this->getReference('user-0'),
                'room'      => $this->getReference('room-0'),
                'date'      => $today,
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('10:30:00'),
                'comment'   => 'Réunion de travail !',
            ],
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-0'),
                'date'      => $today,
                'timeBegin' => new \DateTime('11:00:00'),
                'timeEnd'   => new \DateTime('12:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-0'),
                'date'      => $today,
                'timeBegin' => new \DateTime('12:00:00'),
                'timeEnd'   => new \DateTime('14:00:00'),
                'comment'   => 'Midi jeu non ? Qui est chaud ?',
            ],
            [
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-0'),
                'date'      => $today,
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('14:30:00'),
                'comment'   => 'Reunion avec Danièle',
            ],
            // ==================== Salle 1 (BoxTel du 5ème) =============================================
            [
                'user'      => $this->getReference('user-4'),
                'room'      => $this->getReference('room-1'),
                'date'      => $today,
                'timeBegin' => new \DateTime('08:30:00'),
                'timeEnd'   => new \DateTime('09:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-5'),
                'room'      => $this->getReference('room-1'),
                'date'      => $today,
                'timeBegin' => new \DateTime('09:00:00'),
                'timeEnd'   => new \DateTime('09:30:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-2'),
                'room'      => $this->getReference('room-1'),
                'date'      => $today,
                'timeBegin' => new \DateTime('16:30:00'),
                'timeEnd'   => new \DateTime('17:00:00'),
                'comment'   => 'Appel téléphonique perso',
            ],
            // ==================== Salle 2 (Salle Opéra du 4ème) ========================================
            [
                'user'      => $this->getReference('user-9'),
                'room'      => $this->getReference('room-2'),
                'date'      => $today,
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('16:00:00'),
                'comment'   => "Point équipe Java",
            ],
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-2'),
                'date'      => $today,
                'timeBegin' => new \DateTime('16:00:00'),
                'timeEnd'   => new \DateTime('16:30:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-2'),
                'date'      => $today,
                'timeBegin' => new \DateTime('16:30:00'),
                'timeEnd'   => new \DateTime('17:30:00'),
                'comment'   => null,
            ],
            // ==================== Salle 3 (Petite salle du 4ème) =======================================
            [
                'user'      => $this->getReference('user-2'),
                'room'      => $this->getReference('room-3'),
                'date'      => $today,
                'timeBegin' => new \DateTime('09:00:00'),
                'timeEnd'   => new \DateTime('10:00:00'),
                'comment'   => "Petit déj avec plateau 4eme !!",
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-3'),
                'date'      => $today,
                'timeBegin' => new \DateTime('11:30:00'),
                'timeEnd'   => new \DateTime('12:00:00'),
                'comment'   => null,
            ],
            // Réservation pour les 5 prochains jours ouvrés (la prochaine semaine de travail) ==========
            // ========== Lundi =========================================================================
            // ==================== Salle 0 (Salle du 5ème) ==============================================
            [
                'user'      => $this->getReference('user-0'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtMonday,
                'timeBegin' => new \DateTime('10:00:00'),
                'timeEnd'   => new \DateTime('11:30:00'),
                'comment'   => 'Réunion de travail 2 !',
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtMonday,
                'timeBegin' => new \DateTime('11:30:00'),
                'timeEnd'   => new \DateTime('12:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-9'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtMonday,
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('16:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtMonday,
                'timeBegin' => new \DateTime('16:00:00'),
                'timeEnd'   => new \DateTime('17:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtMonday,
                'timeBegin' => new \DateTime('17:00:00'),
                'timeEnd'   => new \DateTime('17:30:00'),
                'comment'   => 'Entretien',
            ],
            // ==================== Salle 1 (BoxTel du 5ème) =============================================
            [
                'user'      => $this->getReference('user-4'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtMonday,
                'timeBegin' => new \DateTime('08:30:00'),
                'timeEnd'   => new \DateTime('09:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-5'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtMonday,
                'timeBegin' => new \DateTime('09:00:00'),
                'timeEnd'   => new \DateTime('09:30:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-8'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtMonday,
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('10:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-2'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtMonday,
                'timeBegin' => new \DateTime('17:30:00'),
                'timeEnd'   => new \DateTime('18:00:00'),
                'comment'   => 'Appel tél perso',
            ],
            // ==================== Salle 2 (Salle Opéra du 4ème) ========================================
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtMonday,
                'timeBegin' => new \DateTime('9:00:00'),
                'timeEnd'   => new \DateTime('11:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtMonday,
                'timeBegin' => new \DateTime('14:30:00'),
                'timeEnd'   => new \DateTime('17:00:00'),
                'comment'   => null,
            ],
            // ==================== Salle 3 (Petite salle du 4ème) =======================================
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-3'),
                'date'      => $nxtMonday,
                'timeBegin' => new \DateTime('10:00:00'),
                'timeEnd'   => new \DateTime('11:00:00'),
                'comment'   => null,
            ],
            // ========== Mardi =========================================================================
            // ==================== Salle 0 (Salle du 5ème) ==============================================
            [
                'user'      => $this->getReference('user-8'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtTuesday,
                'timeBegin' => new \DateTime('08:30:00'),
                'timeEnd'   => new \DateTime('09:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtTuesday,
                'timeBegin' => new \DateTime('09:00:00'),
                'timeEnd'   => new \DateTime('10:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtTuesday,
                'timeBegin' => new \DateTime('10:00:00'),
                'timeEnd'   => new \DateTime('12:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-9'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtTuesday,
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('16:00:00'),
                'comment'   => 'Réunion avec la direction',
            ],
            [
                'user'      => $this->getReference('user-9'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtTuesday,
                'timeBegin' => new \DateTime('16:00:00'),
                'timeEnd'   => new \DateTime('17:30:00'),
                'comment'   => 'Je résèrve car cela risque fortement de déborder',
            ],
            // ==================== Salle 1 (BoxTel du 5ème) =============================================
            [
                'user'      => $this->getReference('user-8'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtTuesday,
                'timeBegin' => new \DateTime('08:30:00'),
                'timeEnd'   => new \DateTime('09:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-2'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtTuesday,
                'timeBegin' => new \DateTime('16:30:00'),
                'timeEnd'   => new \DateTime('17:00:00'),
                'comment'   => 'Appel téléphonique perso rapide',
            ],
            // ==================== Salle 2 (Salle Opéra du 4ème) ========================================
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtTuesday,
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('10:30:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtTuesday,
                'timeBegin' => new \DateTime('11:00:00'),
                'timeEnd'   => new \DateTime('12:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtTuesday,
                'timeBegin' => new \DateTime('13:30:00'),
                'timeEnd'   => new \DateTime('15:00:00'),
                'comment'   => null,
            ],
            // ==================== Salle 3 (Petite salle du 4ème) =======================================
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-3'),
                'date'      => $nxtTuesday,
                'timeBegin' => new \DateTime('17:00:00'),
                'timeEnd'   => new \DateTime('17:30:00'),
                'comment'   => "Impressions documents...",
            ],
            // ========== Mercredi ======================================================================
            // ==================== Salle 0 (Salle du 5ème) ==============================================
            [
                'user'      => $this->getReference('user-1'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtWednesday,
                'timeBegin' => new \DateTime('08:00:00'),
                'timeEnd'   => new \DateTime('08:30:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtWednesday,
                'timeBegin' => new \DateTime('09:00:00'),
                'timeEnd'   => new \DateTime('10:00:00'),
                'comment'   => 'Entretien candidat : Albert, 33ans',
            ],
            [
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtWednesday,
                'timeBegin' => new \DateTime('10:00:00'),
                'timeEnd'   => new \DateTime('11:00:00'),
                'comment'   => 'Entretien candidat : Marie, 25ans',
            ],
            [
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtWednesday,
                'timeBegin' => new \DateTime('11:00:00'),
                'timeEnd'   => new \DateTime('12:00:00'),
                'comment'   => 'Entretien candidat : Alice, 28ans',
            ],
            [
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtWednesday,
                'timeBegin' => new \DateTime('12:00:00'),
                'timeEnd'   => new \DateTime('13:00:00'),
                'comment'   => 'Entretien candidat : Roger, 46ans',
            ],
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtWednesday,
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('15:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtWednesday,
                'timeBegin' => new \DateTime('15:30:00'),
                'timeEnd'   => new \DateTime('16:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtWednesday,
                'timeBegin' => new \DateTime('18:00:00'),
                'timeEnd'   => new \DateTime('18:30:00'),
                'comment'   => null,
            ],
            // ==================== Salle 1 (BoxTel du 5ème) =============================================
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtWednesday,
                'timeBegin' => new \DateTime('16:30:00'),
                'timeEnd'   => new \DateTime('17:00:00'),
                'comment'   => 'tel',
            ],
            // ==================== Salle 2 (Salle Opéra du 4ème) ========================================
            [
                'user'      => $this->getReference('user-9'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtWednesday,
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('16:00:00'),
                'comment'   => 'Réunion plateau 4eme',
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtWednesday,
                'timeBegin' => new \DateTime('18:00:00'),
                'timeEnd'   => new \DateTime('18:30:00'),
                'comment'   => null,
            ],
            // ==================== Salle 3 (Petite salle du 4ème) =======================================

            // ========== Jeudi =========================================================================
            // ==================== Salle 0 (Salle du 5ème) ==============================================
            [
                'user'      => $this->getReference('user-0'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtThursday,
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('10:30:00'),
                'comment'   => 'Entretien candidat : Fabrice, 27ans',
            ],
            [
                'user'      => $this->getReference('user-0'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtThursday,
                'timeBegin' => new \DateTime('10:30:00'),
                'timeEnd'   => new \DateTime('11:30:00'),
                'comment'   => 'Entretien candidat : Christophe, 36ans',
            ],
            [
                'user'      => $this->getReference('user-8'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtThursday,
                'timeBegin' => new \DateTime('12:00:00'),
                'timeEnd'   => new \DateTime('14:00:00'),
                'comment'   => 'Midi jeux (j\'ai une switch et plusieurs manettes) ??' ,
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtThursday,
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('15:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtThursday,
                'timeBegin' => new \DateTime('15:00:00'),
                'timeEnd'   => new \DateTime('16:30:00'),
                'comment'   => 'Reunion avec Danièle',
            ],
            // ==================== Salle 1 (BoxTel du 5ème) =============================================
            [
                'user'      => $this->getReference('user-4'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtThursday,
                'timeBegin' => new \DateTime('08:00:00'),
                'timeEnd'   => new \DateTime('08:30:00'),
                'comment'   => 'shh',
            ],
            [
                'user'      => $this->getReference('user-8'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtThursday,
                'timeBegin' => new \DateTime('08:30:00'),
                'timeEnd'   => new \DateTime('09:00:00'),
                'comment'   => 'shh',
            ],
            [
                'user'      => $this->getReference('user-5'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtThursday,
                'timeBegin' => new \DateTime('09:00:00'),
                'timeEnd'   => new \DateTime('09:30:00'),
                'comment'   => 'shh',
            ],
            [
                'user'      => $this->getReference('user-2'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtThursday,
                'timeBegin' => new \DateTime('17:30:00'),
                'timeEnd'   => new \DateTime('18:00:00'),
                'comment'   => 'Appel téléphonique perso urgent',
            ],
            // ==================== Salle 2 (Salle Opéra du 4ème) ========================================
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtThursday,
                'timeBegin' => new \DateTime('10:00:00'),
                'timeEnd'   => new \DateTime('12:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtThursday,
                'timeBegin' => new \DateTime('15:30:00'),
                'timeEnd'   => new \DateTime('17:00:00'),
                'comment'   => null,
            ],
            // ==================== Salle 3 (Petite salle du 4ème) =======================================
//            [
//                'user'      => $this->getReference('user-2'),
//                'room'      => $this->getReference('room-3'),
//                'date'      => $nxtThursday,
//                'timeBegin' => new \DateTime('09:00:00'),
//                'timeEnd'   => new \DateTime('10:00:00'),
//                'comment'   => "Petit déj avec plateau 4eme !!",
//            ],
            // ========== Vendredi ======================================================================
            // ==================== Salle 0 (Salle du 5ème) ==============================================
            [
                'user'      => $this->getReference('user-0'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtFriday,
                'timeBegin' => new \DateTime('10:00:00'),
                'timeEnd'   => new \DateTime('11:00:00'),
                'comment'   => 'Point équipe rapide',
            ],
            [
                'user'      => $this->getReference('user-1'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtFriday,
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('16:00:00'),
                'comment'   => 'Pôt de départ',
            ],
            // ==================== Salle 1 (BoxTel du 5ème) =============================================
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtFriday,
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('10:00:00'),
                'comment'   => null,
            ],
            // ==================== Salle 2 (Salle Opéra du 4ème) ========================================
            [
                'user'      => $this->getReference('user-2'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtFriday,
                'timeBegin' => new \DateTime('09:00:00'),
                'timeEnd'   => new \DateTime('10:00:00'),
                'comment'   => "Petit déj avec plateau 4eme !!",
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtFriday,
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('15:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtFriday,
                'timeBegin' => new \DateTime('15:00:00'),
                'timeEnd'   => new \DateTime('15:30:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtFriday,
                'timeBegin' => new \DateTime('16:00:00'),
                'timeEnd'   => new \DateTime('17:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtFriday,
                'timeBegin' => new \DateTime('17:00:00'),
                'timeEnd'   => new \DateTime('17:30:00'),
                'comment'   => null,
            ],
            // ==================== Salle 3 (Petite salle du 4ème) =======================================
            [
                'user'      => $this->getReference('user-2'),
                'room'      => $this->getReference('room-3'),
                'date'      => $nxtFriday,
                'timeBegin' => new \DateTime('09:00:00'),
                'timeEnd'   => new \DateTime('10:00:00'),
                'comment'   => "Petit déj avec plateau 4eme !!",
            ],

            // ========== Réservation pour les 5 prochains jours ouvrés  + 1 semaine =====================
            // ========== Lundi ==========================================================================
            // ==================== Salle 0 (Salle du 5ème) ==============================================
            [
                'user'      => $this->getReference('user-0'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtMondayPlusSeven,
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('11:00:00'),
                'comment'   => 'Réunion équipe PHP',
            ],
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtMondayPlusSeven,
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('15:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtMondayPlusSeven,
                'timeBegin' => new \DateTime('16:00:00'),
                'timeEnd'   => new \DateTime('17:00:00'),
                'comment'   => null,
            ],
            // ==================== Salle 1 (BoxTel du 5ème) =============================================
            [
                'user'      => $this->getReference('user-8'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtMondayPlusSeven,
                'timeBegin' => new \DateTime('08:30:00'),
                'timeEnd'   => new \DateTime('09:00:00'),
                'comment'   => null,
            ],
            // ==================== Salle 2 (Salle Opéra du 4ème) ========================================
            [
                'user'      => $this->getReference('user-9'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtMondayPlusSeven,
                'timeBegin' => new \DateTime('09:00:00'),
                'timeEnd'   => new \DateTime('10:30:00'),
                'comment'   => 'Point équipe Drakkar',
            ],
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtMondayPlusSeven,
                'timeBegin' => new \DateTime('12:00:00'),
                'timeEnd'   => new \DateTime('14:00:00'),
                'comment'   => 'Midi jeux 4eme',
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtMondayPlusSeven,
                'timeBegin' => new \DateTime('15:00:00'),
                'timeEnd'   => new \DateTime('15:30:00'),
                'comment'   => null,
            ],
            // ==================== Salle 3 (Petite salle du 4ème) =======================================
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-3'),
                'date'      => $nxtMondayPlusSeven,
                'timeBegin' => new \DateTime('10:00:00'),
                'timeEnd'   => new \DateTime('11:00:00'),
                'comment'   => null,
            ],
            // ========== Mardi ==========================================================================
            // ==================== Salle 0 (Salle du 5ème) ==============================================
            [
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtTuesdayPlusSeven,
                'timeBegin' => new \DateTime('11:00:00'),
                'timeEnd'   => new \DateTime('11:30:00'),
                'comment'   => 'SVMI Rudy',
            ],
            [
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtTuesdayPlusSeven,
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('16:30:00'),
                'comment'   => 'Visite JPD Unisimlock',
            ],
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtTuesdayPlusSeven,
                'timeBegin' => new \DateTime('17:00:00'),
                'timeEnd'   => new \DateTime('18:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtTuesdayPlusSeven,
                'timeBegin' => new \DateTime('18:00:00'),
                'timeEnd'   => new \DateTime('19:00:00'),
                'comment'   => null,
            ],
            // ==================== Salle 1 (BoxTel du 5ème) =============================================
            [
                'user'      => $this->getReference('user-4'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtTuesdayPlusSeven,
                'timeBegin' => new \DateTime('09:00:00'),
                'timeEnd'   => new \DateTime('09:30:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-5'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtTuesdayPlusSeven,
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('10:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-2'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtTuesdayPlusSeven,
                'timeBegin' => new \DateTime('12:00:00'),
                'timeEnd'   => new \DateTime('12:30:00'),
                'comment'   => 'Appel téléphonique perso',
            ],
            // ==================== Salle 2 (Salle Opéra du 4ème) ========================================
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtTuesdayPlusSeven,
                'timeBegin' => new \DateTime('11:00:00'),
                'timeEnd'   => new \DateTime('12:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtTuesdayPlusSeven,
                'timeBegin' => new \DateTime('14:30:00'),
                'timeEnd'   => new \DateTime('18:30:00'),
                'comment'   => 'Grosse réunion...',
            ],
            // ==================== Salle 3 (Petite salle du 4ème) =======================================
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-3'),
                'date'      => $nxtTuesdayPlusSeven,
                'timeBegin' => new \DateTime('13:00:00'),
                'timeEnd'   => new \DateTime('13:30:00'),
                'comment'   => "dej + appel tel",
            ],
            // ========== Mercredi =======================================================================
            // ==================== Salle 0 (Salle du 5ème) ==============================================
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtWednesdayPlusSeven,
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('12:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtWednesdayPlusSeven,
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('15:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtWednesdayPlusSeven,
                'timeBegin' => new \DateTime('16:00:00'),
                'timeEnd'   => new \DateTime('17:00:00'),
                'comment'   => 'réu visio',
            ],
            // ==================== Salle 1 (BoxTel du 5ème) =============================================
            [
                'user'      => $this->getReference('user-4'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtWednesdayPlusSeven,
                'timeBegin' => new \DateTime('08:30:00'),
                'timeEnd'   => new \DateTime('09:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-5'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtWednesdayPlusSeven,
                'timeBegin' => new \DateTime('09:00:00'),
                'timeEnd'   => new \DateTime('09:30:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-8'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtWednesdayPlusSeven,
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('10:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-0'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtWednesdayPlusSeven,
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('15:00:00'),
                'comment'   => 'Apl tel urgent (prêt banque pour maison)',
            ],
            // ==================== Salle 2 (Salle Opéra du 4ème) ========================================
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtWednesdayPlusSeven,
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('10:30:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-9'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtWednesdayPlusSeven,
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('15:30:00'),
                'comment'   => "Réu new applis Java",
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtWednesdayPlusSeven,
                'timeBegin' => new \DateTime('17:30:00'),
                'timeEnd'   => new \DateTime('18:00:00'),
                'comment'   => null,
            ],
            // ==================== Salle 3 (Petite salle du 4ème) =======================================
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-3'),
                'date'      => $nxtWednesdayPlusSeven,
                'timeBegin' => new \DateTime('12:30:00'),
                'timeEnd'   => new \DateTime('13:00:00'),
                'comment'   => "dej",
            ],
            // ========== Jeudi ==========================================================================
            // ==================== Salle 0 (Salle du 5ème) ==============================================
            [
                'user'      => $this->getReference('user-9'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtThursdayPlusSeven,
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('11:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtThursdayPlusSeven,
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('15:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtThursdayPlusSeven,
                'timeBegin' => new \DateTime('15:00:00'),
                'timeEnd'   => new \DateTime('15:30:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtThursdayPlusSeven,
                'timeBegin' => new \DateTime('16:00:00'),
                'timeEnd'   => new \DateTime('18:30:00'),
                'comment'   => 'COPIL applis JLD',
            ],
            // ==================== Salle 1 (BoxTel du 5ème) =============================================
            [
                'user'      => $this->getReference('user-8'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtThursdayPlusSeven,
                'timeBegin' => new \DateTime('08:30:00'),
                'timeEnd'   => new \DateTime('09:00:00'),
                'comment'   => null,
            ],
            // ==================== Salle 2 (Salle Opéra du 4ème) ========================================
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-3'),
                'date'      => $nxtThursdayPlusSeven,
                'timeBegin' => new \DateTime('11:00:00'),
                'timeEnd'   => new \DateTime('12:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-3'),
                'date'      => $nxtThursdayPlusSeven,
                'timeBegin' => new \DateTime('14:30:00'),
                'timeEnd'   => new \DateTime('15:30:00'),
                'comment'   => null,
            ],
            // ==================== Salle 3 (Petite salle du 4ème) =======================================

            // ========== Vendredi =======================================================================
            // ==================== Salle 0 (Salle du 5ème) ==============================================
            [
                'user'      => $this->getReference('user-8'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtFridayPlusSeven,
                'timeBegin' => new \DateTime('12:00:00'),
                'timeEnd'   => new \DateTime('14:00:00'),
                'comment'   => 'Midi jeu Wii ? Qui est chaud ?',
            ],
            [
                'user'      => $this->getReference('user-9'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtFridayPlusSeven,
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('16:30:00'),
                'comment'   => 'Reunion',
            ],
            // ==================== Salle 1 (BoxTel du 5ème) =============================================
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtFridayPlusSeven,
                'timeBegin' => new \DateTime('10:00:00'),
                'timeEnd'   => new \DateTime('10:30:00'),
                'comment'   => 'Appel perso',
            ],
            // ==================== Salle 2 (Salle Opéra du 4ème) ========================================
            [
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtFridayPlusSeven,
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('10:30:00'),
                'comment'   => "Petit déj avec plateau 4eme !!",
            ],
            [
                'user'      => $this->getReference('user-9'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtFridayPlusSeven,
                'timeBegin' => new \DateTime('17:00:00'),
                'timeEnd'   => new \DateTime('18:00:00'),
                'comment'   => null,
            ],
            // ==================== Salle 3 (Petite salle du 4ème) =======================================
            [
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-3'),
                'date'      => $nxtFridayPlusSeven,
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('10:30:00'),
                'comment'   => "Petit déj avec plateau 4eme !!",
            ],



            // ========== Réservation pour les 5 prochains jours ouvrés  + 2 semaines ====================
            // ========== Lundi ==========================================================================
            // ==================== Salle 0 (Salle du 5ème) ==============================================
            [
                'user'      => $this->getReference('user-0'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtMondayPlusFourteen,
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('11:00:00'),
                'comment'   => 'Réunion équipe PHP',
            ],
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtMondayPlusFourteen,
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('15:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtMondayPlusFourteen,
                'timeBegin' => new \DateTime('16:00:00'),
                'timeEnd'   => new \DateTime('17:00:00'),
                'comment'   => null,
            ],
            // ==================== Salle 1 (BoxTel du 5ème) =============================================
            [
                'user'      => $this->getReference('user-8'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtMondayPlusFourteen,
                'timeBegin' => new \DateTime('08:30:00'),
                'timeEnd'   => new \DateTime('09:00:00'),
                'comment'   => null,
            ],
            // ==================== Salle 2 (Salle Opéra du 4ème) ========================================
            [
                'user'      => $this->getReference('user-9'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtMondayPlusFourteen,
                'timeBegin' => new \DateTime('09:00:00'),
                'timeEnd'   => new \DateTime('10:30:00'),
                'comment'   => 'Point équipe Drakkar',
            ],
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtMondayPlusFourteen,
                'timeBegin' => new \DateTime('12:00:00'),
                'timeEnd'   => new \DateTime('14:00:00'),
                'comment'   => 'Midi jeux 4eme',
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtMondayPlusFourteen,
                'timeBegin' => new \DateTime('15:00:00'),
                'timeEnd'   => new \DateTime('15:30:00'),
                'comment'   => null,
            ],
            // ==================== Salle 3 (Petite salle du 4ème) =======================================
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-3'),
                'date'      => $nxtMondayPlusFourteen,
                'timeBegin' => new \DateTime('10:00:00'),
                'timeEnd'   => new \DateTime('11:00:00'),
                'comment'   => null,
            ],
            // ========== Mardi ==========================================================================
            // ==================== Salle 0 (Salle du 5ème) ==============================================
            [
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtTuesdayPlusFourteen,
                'timeBegin' => new \DateTime('11:00:00'),
                'timeEnd'   => new \DateTime('11:30:00'),
                'comment'   => 'SVMI Rudy',
            ],
            [
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtTuesdayPlusFourteen,
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('16:30:00'),
                'comment'   => 'Visite JPD Unisimlock',
            ],
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtTuesdayPlusFourteen,
                'timeBegin' => new \DateTime('17:00:00'),
                'timeEnd'   => new \DateTime('18:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtTuesdayPlusFourteen,
                'timeBegin' => new \DateTime('18:00:00'),
                'timeEnd'   => new \DateTime('19:00:00'),
                'comment'   => null,
            ],
            // ==================== Salle 1 (BoxTel du 5ème) =============================================
            [
                'user'      => $this->getReference('user-4'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtTuesdayPlusFourteen,
                'timeBegin' => new \DateTime('09:00:00'),
                'timeEnd'   => new \DateTime('09:30:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-5'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtTuesdayPlusFourteen,
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('10:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-2'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtTuesdayPlusFourteen,
                'timeBegin' => new \DateTime('12:00:00'),
                'timeEnd'   => new \DateTime('12:30:00'),
                'comment'   => 'Appel téléphonique perso',
            ],
            // ==================== Salle 2 (Salle Opéra du 4ème) ========================================
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtTuesdayPlusFourteen,
                'timeBegin' => new \DateTime('11:00:00'),
                'timeEnd'   => new \DateTime('12:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtTuesdayPlusFourteen,
                'timeBegin' => new \DateTime('14:30:00'),
                'timeEnd'   => new \DateTime('18:30:00'),
                'comment'   => 'Grosse réunion...',
            ],
            // ==================== Salle 3 (Petite salle du 4ème) =======================================
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-3'),
                'date'      => $nxtTuesdayPlusFourteen,
                'timeBegin' => new \DateTime('13:00:00'),
                'timeEnd'   => new \DateTime('13:30:00'),
                'comment'   => "dej + appel tel",
            ],
            // ========== Mercredi =======================================================================
            // ==================== Salle 0 (Salle du 5ème) ==============================================
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtWednesdayPlusFourteen,
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('12:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtWednesdayPlusFourteen,
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('15:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtWednesdayPlusFourteen,
                'timeBegin' => new \DateTime('16:00:00'),
                'timeEnd'   => new \DateTime('17:00:00'),
                'comment'   => 'réu visio',
            ],
            // ==================== Salle 1 (BoxTel du 5ème) =============================================
            [
                'user'      => $this->getReference('user-4'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtWednesdayPlusFourteen,
                'timeBegin' => new \DateTime('08:30:00'),
                'timeEnd'   => new \DateTime('09:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-5'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtWednesdayPlusFourteen,
                'timeBegin' => new \DateTime('09:00:00'),
                'timeEnd'   => new \DateTime('09:30:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-8'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtWednesdayPlusFourteen,
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('10:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-0'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtWednesdayPlusFourteen,
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('15:00:00'),
                'comment'   => 'Apl tel urgent (prêt banque pour maison)',
            ],
            // ==================== Salle 2 (Salle Opéra du 4ème) ========================================
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtWednesdayPlusFourteen,
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('10:30:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-9'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtWednesdayPlusFourteen,
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('15:30:00'),
                'comment'   => "Réu new applis Java",
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtWednesdayPlusFourteen,
                'timeBegin' => new \DateTime('17:30:00'),
                'timeEnd'   => new \DateTime('18:00:00'),
                'comment'   => null,
            ],
            // ==================== Salle 3 (Petite salle du 4ème) =======================================
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-3'),
                'date'      => $nxtWednesdayPlusFourteen,
                'timeBegin' => new \DateTime('12:30:00'),
                'timeEnd'   => new \DateTime('13:00:00'),
                'comment'   => "dej",
            ],
            // ========== Jeudi ==========================================================================
            // ==================== Salle 0 (Salle du 5ème) ==============================================
            [
                'user'      => $this->getReference('user-9'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtThursdayPlusFourteen,
                'timeBegin' => new \DateTime('08:30:00'),
                'timeEnd'   => new \DateTime('09:30:00'),
                'comment'   => "Entretien candidat : Lionel, 24ans, JAVA",
            ],
            [
                'user'      => $this->getReference('user-9'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtThursdayPlusFourteen,
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('10:30:00'),
                'comment'   => "Entretien candidat : Aude, 26ans, PHP",
            ],
            [
                'user'      => $this->getReference('user-9'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtThursdayPlusFourteen,
                'timeBegin' => new \DateTime('10:30:00'),
                'timeEnd'   => new \DateTime('11:30:00'),
                'comment'   => "Entretien candidat : Ludovic, 27ans, JAVA",
            ],
            [
                'user'      => $this->getReference('user-9'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtThursdayPlusFourteen,
                'timeBegin' => new \DateTime('11:30:00'),
                'timeEnd'   => new \DateTime('12:30:00'),
                'comment'   => "Entretien candidat : Marc, 32ans, JAVA",
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtThursdayPlusFourteen,
                'timeBegin' => new \DateTime('13:30:00'),
                'timeEnd'   => new \DateTime('14:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtThursdayPlusFourteen,
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('15:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtThursdayPlusFourteen,
                'timeBegin' => new \DateTime('15:00:00'),
                'timeEnd'   => new \DateTime('15:30:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtThursdayPlusFourteen,
                'timeBegin' => new \DateTime('16:00:00'),
                'timeEnd'   => new \DateTime('18:30:00'),
                'comment'   => 'COPIL applis JLD',
            ],
            // ==================== Salle 1 (BoxTel du 5ème) =============================================
            [
                'user'      => $this->getReference('user-8'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtThursdayPlusFourteen,
                'timeBegin' => new \DateTime('08:30:00'),
                'timeEnd'   => new \DateTime('09:00:00'),
                'comment'   => null,
            ],
            // ==================== Salle 2 (Salle Opéra du 4ème) ========================================
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-3'),
                'date'      => $nxtThursdayPlusFourteen,
                'timeBegin' => new \DateTime('11:00:00'),
                'timeEnd'   => new \DateTime('12:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-3'),
                'date'      => $nxtThursdayPlusFourteen,
                'timeBegin' => new \DateTime('14:30:00'),
                'timeEnd'   => new \DateTime('15:30:00'),
                'comment'   => null,
            ],
            // ==================== Salle 3 (Petite salle du 4ème) =======================================

            // ========== Vendredi =======================================================================
            // ==================== Salle 0 (Salle du 5ème) ==============================================
            [
                'user'      => $this->getReference('user-8'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtFridayPlusFourteen,
                'timeBegin' => new \DateTime('12:00:00'),
                'timeEnd'   => new \DateTime('14:00:00'),
                'comment'   => 'Midi jeu Wii ? Qui est chaud ?',
            ],
            [
                'user'      => $this->getReference('user-9'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtFridayPlusFourteen,
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('16:30:00'),
                'comment'   => 'Reunion',
            ],
            // ==================== Salle 1 (BoxTel du 5ème) =============================================
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtFridayPlusFourteen,
                'timeBegin' => new \DateTime('10:00:00'),
                'timeEnd'   => new \DateTime('10:30:00'),
                'comment'   => 'Appel perso',
            ],
            // ==================== Salle 2 (Salle Opéra du 4ème) ========================================
            [
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtFridayPlusFourteen,
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('10:30:00'),
                'comment'   => "Petit déj avec plateau 4eme !!",
            ],
            [
                'user'      => $this->getReference('user-9'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtFridayPlusFourteen,
                'timeBegin' => new \DateTime('17:00:00'),
                'timeEnd'   => new \DateTime('18:00:00'),
                'comment'   => null,
            ],
            // ==================== Salle 3 (Petite salle du 4ème) =======================================
            [
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-3'),
                'date'      => $nxtFridayPlusFourteen,
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('10:30:00'),
                'comment'   => "Petit déj avec plateau 4eme !!",
            ],




            // ========== Réservation pour les 5 prochains jours ouvrés  + 3 semaines ====================
            // ========== Lundi ==========================================================================
            // ==================== Salle 0 (Salle du 5ème) ==============================================
            [
                'user'      => $this->getReference('user-0'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtMondayPlusTwentyOne,
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('11:00:00'),
                'comment'   => 'Réunion équipe PHP',
            ],
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtMondayPlusTwentyOne,
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('15:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtMondayPlusTwentyOne,
                'timeBegin' => new \DateTime('16:00:00'),
                'timeEnd'   => new \DateTime('17:00:00'),
                'comment'   => null,
            ],
            // ==================== Salle 1 (BoxTel du 5ème) =============================================
            [
                'user'      => $this->getReference('user-8'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtMondayPlusTwentyOne,
                'timeBegin' => new \DateTime('08:30:00'),
                'timeEnd'   => new \DateTime('09:00:00'),
                'comment'   => null,
            ],
            // ==================== Salle 2 (Salle Opéra du 4ème) ========================================
            [
                'user'      => $this->getReference('user-9'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtMondayPlusTwentyOne,
                'timeBegin' => new \DateTime('09:00:00'),
                'timeEnd'   => new \DateTime('10:30:00'),
                'comment'   => 'Point équipe Drakkar',
            ],
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtMondayPlusTwentyOne,
                'timeBegin' => new \DateTime('12:00:00'),
                'timeEnd'   => new \DateTime('14:00:00'),
                'comment'   => 'Midi jeux 4eme',
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtMondayPlusTwentyOne,
                'timeBegin' => new \DateTime('15:00:00'),
                'timeEnd'   => new \DateTime('15:30:00'),
                'comment'   => null,
            ],
            // ==================== Salle 3 (Petite salle du 4ème) =======================================
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-3'),
                'date'      => $nxtMondayPlusTwentyOne,
                'timeBegin' => new \DateTime('10:00:00'),
                'timeEnd'   => new \DateTime('11:00:00'),
                'comment'   => null,
            ],
            // ========== Mardi ==========================================================================
            // ==================== Salle 0 (Salle du 5ème) ==============================================
            [
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtTuesdayPlusTwentyOne,
                'timeBegin' => new \DateTime('11:00:00'),
                'timeEnd'   => new \DateTime('11:30:00'),
                'comment'   => 'SVMI Rudy',
            ],
            [
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtTuesdayPlusTwentyOne,
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('16:30:00'),
                'comment'   => 'Visite JPD Unisimlock',
            ],
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtTuesdayPlusTwentyOne,
                'timeBegin' => new \DateTime('17:00:00'),
                'timeEnd'   => new \DateTime('18:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtTuesdayPlusTwentyOne,
                'timeBegin' => new \DateTime('18:00:00'),
                'timeEnd'   => new \DateTime('19:00:00'),
                'comment'   => null,
            ],
            // ==================== Salle 1 (BoxTel du 5ème) =============================================
            [
                'user'      => $this->getReference('user-4'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtTuesdayPlusTwentyOne,
                'timeBegin' => new \DateTime('09:00:00'),
                'timeEnd'   => new \DateTime('09:30:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-5'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtTuesdayPlusTwentyOne,
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('10:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-2'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtTuesdayPlusTwentyOne,
                'timeBegin' => new \DateTime('12:00:00'),
                'timeEnd'   => new \DateTime('12:30:00'),
                'comment'   => 'Appel téléphonique perso',
            ],
            // ==================== Salle 2 (Salle Opéra du 4ème) ========================================
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtTuesdayPlusTwentyOne,
                'timeBegin' => new \DateTime('11:00:00'),
                'timeEnd'   => new \DateTime('12:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtTuesdayPlusTwentyOne,
                'timeBegin' => new \DateTime('14:30:00'),
                'timeEnd'   => new \DateTime('18:30:00'),
                'comment'   => 'Grosse réunion...',
            ],
            // ==================== Salle 3 (Petite salle du 4ème) =======================================
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-3'),
                'date'      => $nxtTuesdayPlusTwentyOne,
                'timeBegin' => new \DateTime('13:00:00'),
                'timeEnd'   => new \DateTime('13:30:00'),
                'comment'   => "dej + appel tel",
            ],
            // ========== Mercredi =======================================================================
            // ==================== Salle 0 (Salle du 5ème) ==============================================
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtWednesdayPlusTwentyOne,
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('12:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtWednesdayPlusTwentyOne,
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('15:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtWednesdayPlusTwentyOne,
                'timeBegin' => new \DateTime('16:00:00'),
                'timeEnd'   => new \DateTime('17:00:00'),
                'comment'   => 'réu visio',
            ],
            // ==================== Salle 1 (BoxTel du 5ème) =============================================
            [
                'user'      => $this->getReference('user-4'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtWednesdayPlusTwentyOne,
                'timeBegin' => new \DateTime('08:30:00'),
                'timeEnd'   => new \DateTime('09:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-5'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtWednesdayPlusTwentyOne,
                'timeBegin' => new \DateTime('09:00:00'),
                'timeEnd'   => new \DateTime('09:30:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-8'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtWednesdayPlusTwentyOne,
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('10:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-0'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtWednesdayPlusTwentyOne,
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('15:00:00'),
                'comment'   => 'Apl tel urgent (prêt banque pour maison)',
            ],
            // ==================== Salle 2 (Salle Opéra du 4ème) ========================================
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtWednesdayPlusTwentyOne,
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('10:30:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-9'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtWednesdayPlusTwentyOne,
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('15:30:00'),
                'comment'   => "Réu new applis Java",
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtWednesdayPlusTwentyOne,
                'timeBegin' => new \DateTime('17:30:00'),
                'timeEnd'   => new \DateTime('18:00:00'),
                'comment'   => null,
            ],
            // ==================== Salle 3 (Petite salle du 4ème) =======================================
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-3'),
                'date'      => $nxtWednesdayPlusTwentyOne,
                'timeBegin' => new \DateTime('12:30:00'),
                'timeEnd'   => new \DateTime('13:00:00'),
                'comment'   => "dej",
            ],
            // ========== Jeudi ==========================================================================
            // ==================== Salle 0 (Salle du 5ème) ==============================================
            [
                'user'      => $this->getReference('user-9'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtThursdayPlusTwentyOne,
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('11:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtThursdayPlusTwentyOne,
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('15:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtThursdayPlusTwentyOne,
                'timeBegin' => new \DateTime('15:00:00'),
                'timeEnd'   => new \DateTime('15:30:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtThursdayPlusTwentyOne,
                'timeBegin' => new \DateTime('16:00:00'),
                'timeEnd'   => new \DateTime('18:30:00'),
                'comment'   => 'COPIL applis JLD',
            ],
            // ==================== Salle 1 (BoxTel du 5ème) =============================================
            [
                'user'      => $this->getReference('user-8'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtThursdayPlusTwentyOne,
                'timeBegin' => new \DateTime('08:30:00'),
                'timeEnd'   => new \DateTime('09:00:00'),
                'comment'   => null,
            ],
            // ==================== Salle 2 (Salle Opéra du 4ème) ========================================
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-3'),
                'date'      => $nxtThursdayPlusTwentyOne,
                'timeBegin' => new \DateTime('11:00:00'),
                'timeEnd'   => new \DateTime('12:00:00'),
                'comment'   => null,
            ],
            [
                'user'      => $this->getReference('user-7'),
                'room'      => $this->getReference('room-3'),
                'date'      => $nxtThursdayPlusTwentyOne,
                'timeBegin' => new \DateTime('14:30:00'),
                'timeEnd'   => new \DateTime('15:30:00'),
                'comment'   => null,
            ],
            // ==================== Salle 3 (Petite salle du 4ème) =======================================

            // ========== Vendredi =======================================================================
            // ==================== Salle 0 (Salle du 5ème) ==============================================
            [
                'user'      => $this->getReference('user-8'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtFridayPlusTwentyOne,
                'timeBegin' => new \DateTime('12:00:00'),
                'timeEnd'   => new \DateTime('14:00:00'),
                'comment'   => 'Midi jeu Wii ? Qui est chaud ?',
            ],
            [
                'user'      => $this->getReference('user-9'),
                'room'      => $this->getReference('room-0'),
                'date'      => $nxtFridayPlusTwentyOne,
                'timeBegin' => new \DateTime('14:00:00'),
                'timeEnd'   => new \DateTime('16:30:00'),
                'comment'   => 'Reunion',
            ],
            // ==================== Salle 1 (BoxTel du 5ème) =============================================
            [
                'user'      => $this->getReference('user-6'),
                'room'      => $this->getReference('room-1'),
                'date'      => $nxtFridayPlusTwentyOne,
                'timeBegin' => new \DateTime('10:00:00'),
                'timeEnd'   => new \DateTime('10:30:00'),
                'comment'   => 'Appel perso',
            ],
            // ==================== Salle 2 (Salle Opéra du 4ème) ========================================
            [
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtFridayPlusTwentyOne,
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('10:30:00'),
                'comment'   => "Petit déj avec plateau 4eme !!",
            ],
            [
                'user'      => $this->getReference('user-9'),
                'room'      => $this->getReference('room-2'),
                'date'      => $nxtFridayPlusTwentyOne,
                'timeBegin' => new \DateTime('17:00:00'),
                'timeEnd'   => new \DateTime('18:00:00'),
                'comment'   => null,
            ],
            // ==================== Salle 3 (Petite salle du 4ème) =======================================
            [
                'user'      => $this->getReference('user-3'),
                'room'      => $this->getReference('room-3'),
                'date'      => $nxtFridayPlusTwentyOne,
                'timeBegin' => new \DateTime('09:30:00'),
                'timeEnd'   => new \DateTime('10:30:00'),
                'comment'   => "Petit déj avec plateau 4eme !!",
            ],


        );

        foreach ($reservations as $i => $res) {
            $reservation = new Reservation();

            $reservation->setUser($res['user']);
            $reservation->setRoom($res['room']);
            $reservation->setDate($res['date']);
            $reservation->setTimeBegin($res['timeBegin']);
            $reservation->setTimeEnd($res['timeEnd']);
            $reservation->setComment($res['comment']);

            $manager->persist($reservation);
            $this->addReference('reservation-'.$i, $reservation);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 30;
    }

}