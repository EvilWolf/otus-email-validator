<?php
namespace EvilWolf;

class EmailValidator
{
    protected $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function isValid()
    {
        return $this->checkStringIsEmail()
            && $this->checkMx();
    }

    public function checkStringIsEmail()
    {
        $result = filter_var($this->email, FILTER_VALIDATE_EMAIL, FILTER_FLAG_EMAIL_UNICODE);
        return ($result !== false);
    }

    public function checkMx()
    {
        $domain = explode('@', $this->email)[1];
        return dns_check_record($domain);
    }
}
