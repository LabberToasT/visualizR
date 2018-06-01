<?php

namespace api;

use Klein\Request;
use Klein\ServiceProvider;
use db\DbAdmin;

class GetFirstDBRow
{
    public function __construct(Request $request)
    {
        //hier kann man parameter die mit dem request gesendet wurden
        //z.B.: $request->paramPost()->get('REQUEST_PARAM') holt den wert aus REQUEST_PARAM den man dann in eine lokale varible schreiben kann
    }
    
    public function getFirstDbRow(ServiceProvider $service)
    {
    
        /** @var DbAdmin $conn */
        $conn = $service->db;
        
        return $conn->getFirstDbRow();
    }
}