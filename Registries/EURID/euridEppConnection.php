<?php
include_once(dirname(__FILE__).'/../../Protocols/EPP/eppConnection.php');

#
# Load the EURID specific additions
#
#include_once(dirname(__FILE__).'/euridEppCreateRequest.php');
#include_once(dirname(__FILE__).'/euridEppCreateResponse.php');
#include_once(dirname(__FILE__).'/euridEppCreateNsgroupRequest.php');
#include_once(dirname(__FILE__).'/euridEppCreateNsgroupResponse.php');
#include_once(dirname(__FILE__).'/euridEppAuthcodeRequest.php');
include_once(dirname(__FILE__).'/euridEppInfoDomainRequest.php');
include_once(dirname(__FILE__).'/euridEppInfoDomainResponse.php');

class euridEppConnection extends eppConnection
{

    public function __construct()
    {
        parent::__construct(false);
        parent::setHostname('ssl://epp.tryout.registry.eu');
        parent::setPort(700);
        parent::setUsername('');
        parent::setPassword('');
        parent::setTimeout(5);
        parent::setLanguage('en');
        parent::setVersion('1.0');
        //parent::enableDnssec();
        parent::setServices(array('urn:ietf:params:xml:ns:domain-1.0'=>'domain','urn:ietf:params:xml:ns:contact-1.0'=>'contact'));
        //parent::addExtension('nsgroup','http://www.eurid.eu/xml/epp/nsgroup-1.1');
        parent::addService('http://www.eurid.eu/xml/epp/registrar-1.0','registrar');

        parent::addExtension('contact-ext','http://www.eurid.eu/xml/epp/contact-ext-1.0');
        parent::addExtension('domain-ext','http://www.eurid.eu/xml/epp/domain-ext-1.0');
        parent::addExtension('authInfo','http://www.eurid.eu/xml/epp/authInfo-1.0');
        #parent::addCommandResponse('euridEppCreateNsgroupRequest', 'euridEppCreateNsgroupResponse');
        #parent::addCommandResponse('euridEppCreateRequest', 'euridEppCreateResponse');
        #parent::addCommandResponse('euridEppAuthcodeRequest', 'eppResponse');
        parent::addCommandResponse('euridEppInfoDomainRequest', 'euridEppInfoDomainResponse');
        #parent::addCommandResponse('euridEppCreateRequest', 'eppCreateResponse');
        #parent::addCommandResponse('eppCheckRequest', 'euridEppCheckResponse');
    }

}
