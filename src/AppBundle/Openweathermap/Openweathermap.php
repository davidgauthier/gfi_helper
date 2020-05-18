<?php


namespace AppBundle\Openweathermap;


use GuzzleHttp\Client;
use JMS\Serializer\Serializer;

class Openweathermap
{

    private $openweathermapClient;

    private $apiKey;

    private $city;

    private $serializer;


    public function __construct(Client $openweathermapClient, $apiKey, $city, Serializer $serializer)
    {
        $this->openweathermapClient = $openweathermapClient;
        $this->apiKey               = $apiKey;
        $this->city                 = $city;
        $this->serializer           = $serializer;
    }

    public function getCurrentWeather(){
        $uri = '/data/2.5/weather?q=' . $this->city . '&state=FR&units=metric&lang=fr&appid='.$this->apiKey;

        $response = $this->openweathermapClient->get($uri);

        $data = $this->serializer->deserialize(
            $response->getBody()->getContents(),
            'array',
            'json'
        );

        return $data;
    }


    public function getFiveDaysForecastWeather(){
        $uri = '/data/2.5/forecast?q=' . $this->city . '&state=FR&units=metric&lang=fr&appid='.$this->apiKey;

        $response = $this->openweathermapClient->get($uri);

        $data = $this->serializer->deserialize(
            $response->getBody()->getContents(),
            'array',
            'json'
        );

        $resultat = [
            'city' => $data['city']['name'],
            'list' => $data['list'],
        ];

        $res = [];
        foreach ($resultat['list'] as $i) {
            $temp = [
                'city'          => $resultat['city'],
                'main'          => $i['weather'][0]['main'],
                'description'   => $i['weather'][0]['description'],
                'icon_url'      => 'http://openweathermap.org/img/wn/'.$i['weather'][0]['icon'].'.png',
                'dt_txt'        => $i['dt_txt'],
                'temperature'   => $i['main']['temp'],
                'clouds'        => $i['clouds']['all'],
                'wind'          => $i['wind']['speed'],
            ];
            $res[] = $temp;
        }

        return $res;
    }



}