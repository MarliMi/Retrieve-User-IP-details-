class IPGET{
    private $ip;
    private $country;
    private $isp;
    private $media;


    public function __construct(){
        $this->retriveIPInformation();
    }


    public function retriveIPInformation(){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://geo.ipify.org/api/v2/country,city?apiKey=APIKEY&ipAddress=' . $_SERVER['REMOTE_ADDR']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);

        //Error checking: 

        $HTTP_STATUS = CURLINFO_HTTP_CODE;

        if($HTTP_STATUS >= 400){
            $this->ip = $HTTP_STATUS;
            $this->country = $HTTP_STATUS;
            $this->country = $HTTP_STATUS;
            $this->country = $HTTP_STATUS;
        }

        $dataDecoded = json_decode($output);

        if(json_last_error() != JSON_ERROR_NONE || $output == false){
            $this->ip = json_last_error();
            $this->country = json_last_error();
            $this->country = json_last_error();
            $this->country = json_last_error();
        }

        //Set all values.
            $this->ip = $dataDecoded->ip;
            $this->country = $dataDecoded->location->country;
            $this->isp = $dataDecoded->isp;
            $this->media = $dataDecoded->location->region;
    }

    //Set all values:

    public function showIP(){
        return $this->ip;
    }

    public function showCountry(){
        return $this->country;
    }

    public function showISP(){
        return $this->isp;
    }
   
    public function showMedia(){
        return $this->media;
    }
}
?>
