<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ldap
{
    private $ldapconn;
    private $ou_year = array (2014);
    private $ou_month = array ("july", "september");
    private $res2 = NULL;
    private $i = 0;

    function __construct()
    {

        if ( ! file_exists($file_path = APPPATH.'config/ldap.php'))
        {

            show_error('The configuration file ldap.php does not exist.');
        }
        include($file_path);

        $this->ldapconn = ldap_connect($ldap['uri'])
            or die("Could not connect to LDAP server.<BR />");

        if (!ldap_set_option($this->ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3))
            show_error('Failed to set protocol version to 3<BR />');
        $bind = @ldap_bind($this->ldapconn, 'uid='.$ldap['binduser'].',ou=august,ou=2013,ou=paris,ou=people,dc=42,dc=fr', $ldap['bindpass']);

        if (!$bind)
            show_error('Failed to bind<BR />');
    }

    function get_search($uid, $y)
    {
        $res = ldap_search($this->ldapconn, 'ou=august,ou='.$y.',ou=paris,ou=people,dc=42,dc=fr', 'uid='.$uid);

        $this->res2 = ldap_get_entries($this->ldapconn, $res);

        if (count($this->res2) === 1)
        {
            $res = ldap_search($this->ldapconn, 'ou=july ,ou='.$y.',ou=paris,ou=people,dc=42,dc=fr', 'uid='.$uid);

            $this->res2 = ldap_get_entries($this->ldapconn, $res);

            if (count($this->res2) === 1)
            {
                $res = ldap_search($this->ldapconn, 'ou=september ,ou='.$y.',ou=paris,ou=people,dc=42,dc=fr', 'uid='.$uid);

                $this->res2 = ldap_get_entries($this->ldapconn, $res);
            }
        }
        return $this->res2;
    }

    function get_user_uid($uid)
    {
        $this->res2 = $this->get_search($uid, 2013);

        //ajouter par aemebiku
        if (count($this->res2) === 1)
        {
            $this->res2 = $this->get_search($uid,2014);
            if (count($this->res2) === 1)
            {
                $this->res2 = $this->get_search($uid,2015);
            }
        }
        //print_r(count($this->res2));
        return $this->res2;
    }


    function is_valid_user($uid, $password)
    {
        echo "valid_user";
        $bind = @ldap_bind($this->ldapconn, "uid=".$uid.",ou=august,ou=2013,ou=paris,ou=people,dc=42,dc=fr", $password);
        if(!$bind)
        {
            $bind = @ldap_bind($this->ldapconn, "uid=".$uid.",ou=august,ou=2014,ou=paris,ou=people,dc=42,dc=fr", $password);
            if(!$bind){
                $bind = @ldap_bind($this->ldapconn, "uid=".$uid.",ou=august,ou=2015,ou=paris,ou=people,dc=42,dc=fr", $password);
            }
        }

        return ($bind);
    }




}