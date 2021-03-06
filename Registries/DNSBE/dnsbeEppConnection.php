<?php
include_once(dirname(__FILE__).'/../../Protocols/EPP/eppConnection.php');

#
# Load the DNSBE specific additions
#
include_once(dirname(__FILE__).'/dnsbeEppCreateDomainRequest.php');
include_once(dirname(__FILE__).'/dnsbeEppCreateContactRequest.php');
include_once(dirname(__FILE__).'/dnsbeEppCreateResponse.php');
include_once(dirname(__FILE__).'/dnsbeEppCreateNsgroupRequest.php');
include_once(dirname(__FILE__).'/dnsbeEppCreateNsgroupResponse.php');
include_once(dirname(__FILE__).'/dnsbeEppAuthcodeRequest.php');
include_once(dirname(__FILE__).'/dnsbeEppInfoDomainRequest.php');
include_once(dirname(__FILE__).'/dnsbeEppInfoDomainResponse.php');
include_once(dirname(__FILE__).'/dnsbeEppTransferRequest.php');

class dnsbeEppConnection extends eppConnection
{

    public function __construct($logging=false)
    {
        parent::__construct($logging);
        parent::setHostname('ssl://epp.registry.be');
        parent::setPort('33128');
        parent::setUsername('');
        parent::setPassword('');
        parent::setTimeout(5);
        parent::setLanguage('en');
        parent::setVersion('1.0');
        parent::addExtension('nsgroup','http://www.dns.be/xml/epp/nsgroup-1.0');
        parent::addExtension('registrar','http://www.dns.be/xml/epp/registrar-1.0');
        parent::addExtension('dnsbe','http://www.dns.be/xml/epp/dnsbe-1.0');
        parent::enableDnssec();
        #parent::addExtension('keygroup','http://www.dns.be/xml/epp/keygroup-1.0');
        parent::addCommandResponse('dnsbeEppCreateNsgroupRequest', 'dnsbeEppCreateNsgroupResponse');
        parent::addCommandResponse('dnsbeEppCreateDomainRequest', 'dnsbeEppCreateResponse');
        parent::addCommandResponse('dnsbeEppCreateContactRequest', 'dnsbeEppCreateResponse');
        parent::addCommandResponse('dnsbeEppAuthcodeRequest', 'eppResponse');
        parent::addCommandResponse('dnsbeEppInfoDomainRequest', 'dnsbeEppInfoDomainResponse');
    }

}
