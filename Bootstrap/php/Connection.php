<?php
/**
 * Class Connection
 * This class trying to open connection with database
 */

class Connection
{
    private $connectionEstablished = false;
    private $connect = null;

    /**
     * Check connection status outside Connection class
     */
    public function getConnectionStatus()
    {
        return $this->connectionEstablished;
    }


    /**
     * This function returns information about connection
     */
    public function getConnectData()
    {
        return $this->connect;
    }

    /**
     * Get access to connection function outside Connection class
     */
    public function makeConnection()
    {
        return $this->doConnection();
    }

    /**
     * Connect to database using data from DataBaseInfo class
     *
     * @return array - In case of error return array with error message
     */
    private function doConnection()
    {
        $connectInfo = array();
        $connect = null;
        $driver = new mysqli_driver();
        $driver->report_mode = MYSQLI_REPORT_ALL;
        $serverName = DataBaseInfo::Servername;
        $userName = DataBaseInfo::Username;
        $password = DataBaseInfo::Password;
        $dbName = DataBaseInfo::DbName;

        try {
            $this->connect = new mysqli($serverName, $userName, $password, $dbName);
            $this->connectionEstablished = true;
        } catch (\mysqli_sql_exception $error) {
            $connectInfo[] = 'Connection failed: ' . $error->getMessage();
            $this->connectionEstablished = false;
            return $connectInfo;
        }
    }
}