<?php

namespace jorgeeqt\libs\device;

use jorgeeqt\PlayerTag;

use jorgeeqt\InstancePluginReference;

/**

 * Class DeviceModel

 * @package core\system\device

 */

class DeviceModel {

		use InstancePluginReference;

	

	/** @var Array[] $playerData */

	private $playerData = [];

	

	/** @var Array[] $deviceOSVals */

	private $deviceOSVals = [];

    

    /** @var Array[] $inputVals */

    private $inputVals = [];

    

    /**

     * DeviceModel constructor

     */

    public function __construct(){

    	

        $this->deviceOSVals = [

	        "Unknown",

	        "Android",

	        "iOS",

	        "OSX",

	        "FireOS",

	        "VRGear",

	        "VRHololens",

	        "Win10",

	        "Win32",

	        "Dedicated",

	        "TVOS",

	        "PS4",

	        "Nintendo Switch",

	        "Xbox",

	        "Linux"

        ];

        

        $this->inputVals = [

            "Unknown",

            "Keyboard",

            "Touch",

            "Controller",

            "Motion-Controller"

        ];

    	

    }

	

	/**

	 * @return Array[]

	 */

	public function getListDevices() : array {

		

		return $this->deviceOSVals;

		

	}

	

	/**

	 * @return Array[]

	 */

	public function getListInputs() : array {

		

		return $this->inputVals;

		

	}

	

	/**

	 * @param string $name

	 * @param Array[] $data

	 */

	public function setDevice(string $name, array $data){

		

		foreach($data as $key => $value){

			

			$this->playerData[$name][$key] = $value;

			

		}

		

	}

	

	/**

	 * @param string $name

	 * @return string

	 */

	public function getDeviceOS(string $name) : string {

		

		return $this->playerData[$name]["DeviceOS"] ?? "Unknown";

		

	}

	

	/**

	 * @param string $name

	 * @return string

	 */

	public function getInput(string $name) : string {

		

		return $this->playerData[$name]["CurrentInputMode"] ?? "Unknown";

		

	}

	

}

?>
