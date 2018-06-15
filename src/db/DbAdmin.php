<?php

namespace db;

/**
 * Class that handles the database connection and the queries
 */
class DbAdmin
{
    // Object that holds the database connection
    protected $myDb = null;
    
    /**
     * DbAdmin constructor.
     *
     * @param $dbName
     * @param $dbUser
     * @param $dbPass
     */
    public function __construct($dbName, $dbUser, $dbPass)
    {
        // open database connection if not already established
        if (!$this->myDb) {
            try {
                
                // connect to local database
                $this->myDb = new \PDO('mysql:host=localhost;dbname=' . $dbName, $dbUser, $dbPass);
                $this->myDb->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                
                // throw exception if something during the database initialisation fails
                throw new \Exception($e->getMessage());
            }
        }
    }
    
    /**
     * Method to fetch all election results
     *
     * @return array
     */
    public function getElectionResults()
    {
        if ($this->myDb) {
            
            // database query
            $query = 'select
SUM(gueltig) as gueltig,
SUM(cdu) +
SUM(die_linke) +
SUM(spd) +
SUM(gruene) +
SUM(fdp) +
SUM(piraten) +
SUM(npd) +
SUM(bueso) +
SUM(mlpd) +
SUM(afd) +
SUM(big) +
SUM(pro_deutschland) +
SUM(freie_waehler) +
SUM(die_partei) +
SUM(boes) +
SUM(b) +
SUM(buendniss_21_rrp) +
SUM(dkp) +
SUM(die_violetten) +
SUM(ditsche) +
SUM(di_leo) +
SUM(sylla) +
SUM(fricke) +
SUM(otto) +
SUM(beckmann) +
SUM(snelinski) as gesamt,
SUM(cdu) as CDU,
SUM(die_linke) as "Die Linke",
SUM(spd) as SPD,
SUM(gruene) as Gruene,
SUM(fdp) as FDP,
SUM(piraten) as Piraten,
SUM(npd) as NPD,
SUM(bueso) as Bueso,
SUM(mlpd) as MLPD,
SUM(afd) as AFD,
SUM(big) as BIG,
SUM(pro_deutschland) as "Pro Deutschland",
SUM(freie_waehler) as "Freie Wähler",
SUM(die_partei) as "Die Partei",
SUM(boes) as "Boes",
SUM(b) as B,
SUM(buendniss_21_rrp) as "Bündniss 21 RRP",
SUM(dkp) as DKP,
SUM(die_violetten) as "Die Violetten",
SUM(ditsche) as Ditsche,
SUM(di_leo) as "Die Leo",
SUM(sylla) as Sylla ,
SUM(fricke) as Fricke ,
SUM(otto) as Otto,
SUM(beckmann) as Beckmann,
SUM(snelinski) as Snelinksi
from
berlin_elections
group by
bezirk_nr;';
            
            // prepare query for execution
            $stmt = $this->myDb->prepare($query);
            $stmt->execute();
            
            // fetch and return all query results
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            
            // throw exception if database connection closed
            throw new \Exception('No active db connection!');
        }
    }
    
    /**
     * Method to fetch the election results for one party
     *
     * @param $party string
     *
     * @return array
     */
    public function getElectionDataForOneParty($party)
    {
        if ($this->myDb) {
            
            // prepare query for execution and bind parameters to placeholders
            $query = "SELECT SUM(':party') FROM berlin_elections group by bezirk_nr;";
            $stmt = $this->myDb->query($query);
            $stmt->bindParam(':party', $party);
            $stmt->execute();
            
            //fetch and return all query results
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            
            // throw exception if database connection closed
            throw new \Exception('No active db connection!');
        }
    }
    
    /**
     * Method to fetch all election results for one district
     *
     * @param $district
     *
     * @return array
     */
    public function getResultsForOneDistrict($district)
    {
        if ($this->myDb) {
            
            // database query
            $query = 'SELECT
SUM(cdu) as CDU,
SUM(die_linke) as "Die Linke",
SUM(spd) as SPD,
SUM(gruene) as Gruene,
SUM(fdp) as FDP,
SUM(piraten) as Piraten,
SUM(npd) as NPD,
SUM(bueso) as BUESO,
SUM(mlpd) as MLPD,
SUM(afd) as AFD,
SUM(big) as BIG,
SUM(pro_deutschland) as "Pro Deutschland",
SUM(freie_waehler) as "Freie Wähler",
SUM(die_partei) as "Die Partei",
SUM(boes) as BOES,
SUM(b) as B,
SUM(buendniss_21_rrp) as "Buendnis 21 RRP",
SUM(dkp) as DKP,
SUM(die_violetten) as "Die Violetten",
SUM(ditsche) as Ditsche,
SUM(di_leo) as "Die Leo",
SUM(sylla) as Sylla ,
SUM(fricke) as Fricke ,
SUM(otto) as Otto,
SUM(beckmann) as Beckmann,
SUM(snelinski) as Snelinski
FROM
berlin_elections
WHERE bezirk_name = :bezirkName ;';
            
            // prepare query for execution and bind parameters to placeholders
            $stmt = $this->myDb->prepare($query);
            $stmt->bindParam(':bezirkName', $district);
            $stmt->execute();
            
            // fetch and return all query results
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            
            // throw exception if database connection closed
            throw new \Exception('No active db connection!');
        }
    }
}