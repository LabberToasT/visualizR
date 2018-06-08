<?php

namespace db;

class DbAdmin
{
    protected $myDb = null;
    
    public function __construct($dbName, $dbUser, $dbPass)
    {
        if (!$this->myDb) {
            try {
                
                $this->myDb = new \PDO('mysql:host=localhost;dbname=' . $dbName, $dbUser, $dbPass);
                $this->myDb->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                
                throw new \Exception($e->getMessage());
            }
        }
    }
    
    /**
     * Methode, um alle Wahlergebnisse aus der Datenbank abzufragen.
     */
    public function getElectionResults()
    {
        if ($this->myDb) {
            
            $command = 'select
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
            SUM(cdu) as cdu,
            SUM(die_linke) as die_linke,
            SUM(spd) as spd,
            SUM(gruene) as gruene,
            SUM(fdp) as fdp,
            SUM(piraten) as piraten,
            SUM(npd) as npd,
            SUM(bueso) as bueso,
            SUM(mlpd) as mlpd,
            SUM(afd) as afd,
            SUM(big) as big,
            SUM(pro_deutschland) as pro_deutschland,
            SUM(freie_waehler) as freie_waehler,
            SUM(die_partei) as die_partei,
            SUM(boes) as boes,
            SUM(b) as b,
            SUM(buendniss_21_rrp) as buendniss_21_rrp,
            SUM(dkp) as dkp,
            SUM(die_violetten) as die_violetten,
            SUM(ditsche) as ditsche,
            SUM(di_leo) as di_leo,
            SUM(sylla) as sylla ,
            SUM(fricke) as fricke ,
            SUM(otto) as otto,
            SUM(beckmann) as beckmann,
            SUM(snelinski) as snelinski
            from
            berlin_elections
            group by
            bezirk_nr, ASC;';
            
            $stmt = $this->myDb->prepare($command);
            $stmt->execute();
            
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            
            throw new \Exception('No active db connection!');
        }
    }
    
    public function getResultsForOneDistrict($district)
    {
        if ($this->myDb) {
            
            $command = 'SELECT
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
            WHERE bezirk_name = :bezirkName
            ORDER BY DESC;';
            
            $stmt = $this->myDb->prepare($command);
            $stmt->bindParam(':bezirkName', $district);
            $stmt->execute();
            
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            
            throw new \Exception('No active db connection!');
        }
    }
    
    /**
     * Methode, welche einfach den ersten Eintrag der Datenbank zurückgibt.
     *
     * @return bool
     */
    public function getFirstDbRow()
    {
        if ($this->myDb) {
            
            $command = 'select * from berlin_elections limit 1;';
            
            $stmt = $this->myDb->prepare($command);
            
            return $stmt->execute();
        }
    }
}