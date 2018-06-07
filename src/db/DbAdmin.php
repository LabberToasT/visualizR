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
bezirk_nr,
bezirk_name,
sum(gueltig) as gueltig,
sum(cdu) +
sum(die_linke) +
sum(spd) +
sum(gruene) +
sum(fdp) +
sum(piraten) +
sum(npd) +
sum(bueso) +
sum(mlpd) +
sum(afd) +
sum(big) +
sum(pro_deutschland) +
sum(freie_waehler) +
sum(die_partei) +
sum(boes) +
sum(b) +
sum(buendniss_21_rrp) +
sum(dkp) +
sum(die_violetten) +
sum(ditsche) +
sum(di_leo) +
sum(sylla) +
sum(fricke) +
sum(otto) +
sum(beckmann) +
sum(snelinski) as test_wert,
sum(cdu) as cdu,
sum(die_linke) as die_linke,
sum(spd) as spd,
sum(gruene) as gruene,
sum(fdp) as fdp,
sum(piraten) as piraten,
sum(npd) as npd,
sum(bueso) as bueso,
sum(mlpd) as mlpd,
sum(afd) as afd,
sum(big) as big,
sum(pro_deutschland) as pro_deutschland,
sum(freie_waehler) as freie_waehler,
sum(die_partei) as die_partei,
sum(boes) as boes,
sum(b) as b,
sum(buendniss_21_rrp) as buendniss_21_rrp,
sum(dkp) as dkp,
sum(die_violetten) as die_violetten,
sum(ditsche) as ditsche,
sum(di_leo) as di_leo,
sum(sylla) as sylla ,
sum(fricke) as fricke ,
sum(otto) as otto,
sum(beckmann) as beckmann,
sum(snelinski) as snelinski
from
berlin_elections
group by
bezirk_nr;';
            
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
            
            $command = 'select
sum(cdu) as cdu,
sum(die_linke) as die_linke,
sum(spd) as spd,
sum(gruene) as gruene,
sum(fdp) as fdp,
sum(piraten) as piraten,
sum(npd) as npd,
sum(bueso) as bueso,
sum(mlpd) as mlpd,
sum(afd) as afd,
sum(big) as big,
sum(pro_deutschland) as pro_deutschland,
sum(freie_waehler) as freie_waehler,
sum(die_partei) as die_partei,
sum(boes) as boes,
sum(b) as b,
sum(buendniss_21_rrp) as buendniss_21_rrp,
sum(dkp) as dkp,
sum(die_violetten) as die_violetten,
sum(ditsche) as ditsche,
sum(di_leo) as di_leo,
sum(sylla) as sylla ,
sum(fricke) as fricke ,
sum(otto) as otto,
sum(beckmann) as beckmann,
sum(snelinski) as snelinski
from
berlin_elections
where bezirk_name = :bezirkName;';
            
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