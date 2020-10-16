<?php

/**
 * @Entity(repositoryClass="RegistrantRepo") @Table(name="registrants")
*/
class RegistrantEntity
{
    /**
     * @Id @GeneratedValue(strategy="AUTO") @Column(type="integer")
     */
    protected $id;

    /**
     * @Column(type="string", nullable=FALSE, length=15, unique=TRUE)
     *
     * @var string
     */
    protected $username;

    /**
     * @Column(type="string", nullable=TRUE, length=15, unique=TRUE)
     *
     * @var string
     */
    protected $regId; // Nomor pendaftaran

    /**
     * @Column(type="string", nullable=FALSE)
     *
     * @var string
     */
    protected $password;

    /**
     * @Column(type="string", nullable=FALSE)
     *
     * @var string
     */
    protected $name;

    /**
     * @Column(type="string", nullable=TRUE)
     *
     * @var string
     */
    protected $uploadDir;

    /**
     * @Column(type="string", length=10, nullable=FALSE)
     *
     * @var string
     */
    protected $gender;

    /**
     * @Column(type="string", nullable=FALSE)
     *
     * @var string
     */
    protected $previousSchool;

    /**
     * @Column(type="string", nullable=TRUE)
     *
     * @var string
     */
    protected $nisn;

    /**
     * @Column(type="string", nullable=TRUE)
     *
     * @var string
     */
    protected $cp; // (8/12/2015 : Diganti No. HP)

    /**
     * @Column(type="string", length=15, nullable=FALSE)
     *
     * @var string
     */
    protected $program; // NOTE: IPA Reguler, IPS Reguler, IPA Tahfidz, IPS Tahfidz

    /**
     * @Column(type="datetime", nullable=FALSE)
     *
     * @var DateTime
     */
    protected $registrationTime;

    /**
     * @OneToOne(targetEntity="RegistrantDataEntity", mappedBy="registrant", orphanRemoval=true, cascade={"persist"})
     *
     * @var RegistrantDataEntity
     **/
    protected $registrantData;

    /**
     * @OneToOne(targetEntity="ParentEntity")
     * @JoinColumn(name="father_id", referencedColumnName="id", nullable=TRUE, onDelete="CASCADE")
     *
     * @var ParentEntity
     **/
    protected $father;

    /**
     * @OneToOne(targetEntity="ParentEntity")
     * @JoinColumn(name="mother_id", referencedColumnName="id", nullable=TRUE, onDelete="CASCADE")
     *
     * @var ParentEntity
     **/
    protected $mother;

    /**
     * @OneToOne(targetEntity="ParentEntity")
     * @JoinColumn(name="guardian_id", referencedColumnName="id", nullable=TRUE, onDelete="CASCADE")
     *
     * @var ParentEntity
     **/
    protected $guardian;

    /**
     * @OneToOne(targetEntity="PaymentEntity", mappedBy="registrant", orphanRemoval=true, cascade={"persist"})
     *
     * @var PaymentEntity
     **/
    protected $paymentData;
    
    /**
     * @Column(type="bigint", nullable=TRUE)
     *
     * @var string
     */
    protected $initialCost; // Uang Pangkal

    /**
     * @Column(type="bigint", nullable=TRUE)
     *
     * @var string
     */
    protected $subscriptionCost; // Uang Bulanan
    
    /**
     * @Column(type="bigint", nullable=TRUE)
     *
     * @var string
     */
    protected $landDonation; // Wakaf Tanah

    /**
     * @Column(type="boolean", nullable=TRUE)
     *
     * @var boolean
     */
    protected $BuyingLaptop; // Wakaf Tanah
    
    /**
     * @Column(type="bigint", nullable=TRUE)
     *
     * @var string
     */
    protected $qurban; // contoh isi: (2019;), (2019;2020;) dst

    /**
     * @Column(type="string", nullable=TRUE)
     *
     * @var string
     */
    protected $mainParent;

    /**
     * @Column(type="string", nullable=TRUE)
     *
     * @var bool
     */
    protected $verified; //null = belum, valid  = sudah, tidak valid = salah

    /**
     * @Column(type="boolean", nullable=TRUE)
     *
     * @var bool
     */
    protected $finalized;

    /**
     * @Column(type="boolean", nullable=TRUE)
     *
     * @var bool
     */
    protected $deleted;
    
    /**
     * One Product has Many Features.
     * @OneToMany(targetEntity="CertificateEntity", mappedBy="registrant")
     */
    private $certificates;
    
    public function __construct() {
        $this->certificates = new Doctrine\Common\Collections\ArrayCollection();
    }

    public function getArray($vars = ['id', 'regId', 'name', 'gender', 'previousSchool', 'nisn', 'program', 
        'deleted', 'registrationTime', 'registrantData', 'father', 'mother', 
        'guardian', 'paymentData', 'initialCost', 'subscriptionCost', 'boardingKit', 'landDonation', ])
    {
        $arrData = [];
        foreach ($vars as $var) {
            $strFunct = 'get'.ucfirst($var);
            $arrData [$var] = $this->$strFunct();
        }

        return $arrData;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getRegId()
    {
        return $this->regId;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getPreviousSchool()
    {
        return $this->previousSchool;
    }

    public function getNisn()
    {
        return $this->nisn;
    }

    public function getCp()
    {
        return $this->cp;
    }

    public function getProgram()
    {
        return $this->program;
    }

    public function getRegistrationTime()
    {
        return $this->registrationTime;
    }

    public function getRegistrantData()
    {
        return $this->registrantData;
    }

    public function getFather()
    {
        return $this->father;
    }

    public function getMother()
    {
        return $this->mother;
    }

    public function getGuardian()
    {
        return $this->guardian;
    }

    public function getPaymentData()
    {
        return $this->paymentData;
    }

    public function getInitialCost()
    {
        return $this->initialCost;
    }

    public function getSubscriptionCost()
    {
        return $this->subscriptionCost;
    }

    public function getMainParent()
    {
        return $this->mainParent;
    }

    public function getMainParentObj()
    {
        $var = strtolower($this->mainParent);
        $main_parent = null;
        if(is_null($this->$var)){
            $main_parent = $this->father;
        } else {
            $main_parent = $this->$var;
        }
        return $main_parent;
    }

    public function getCompleted()
    {
        $res = (!(empty($this->getFather()) || empty($this->getFather()) ||
                empty($this->getMother()) || empty($this->getSubscriptionCost()) ||
                empty($this->getInitialCost()) || empty($this->getMainParent()) || 
                empty($this->getRegistrantData())));
        return $res;
    }

    public function getDeleted()
    {
        return $this->deleted;
    }

    public function getFinalized()
    {
        return is_null($this->finalized) ? false : $this->finalized;
    }

    public function getKode()
    {
        return sprintf("%03d", $this->id);
    }
    public function getVerified()
    {
        return $this->verified;
    }
    public function getBoardingKit()
    {
        return (is_null($this->boardingKit)) ? false : $this->boardingKit;
    }
    public function getLandDonation() {
        return $this->landDonation;
    }
    
    public function getQurban() {
        return $this->qurban;
    }

    public function getCertificates() {
        return $this->certificates;
    }
    
    public function getScheme(){
        if($this->isCertificatesEmpty()){
            return null;
        } else {
            return $this->certificates->first()->getScheme();
        }
    }
    
    public function isCertificatesEmpty(){
        return $this->certificates->isEmpty();
    }
    
    public function getCertificatesCount(){
        return $this->certificates->count();
    }

    public function addCertificates($cert){
        $this->certificates->add($cert);
        return $this;
    }

    public function setQurban($qurban) {
        $this->qurban = $qurban;
        return $this;
    }
    
    public function setLandDonation($landDonation) {
        $this->landDonation = $landDonation;
        return $this;
    }

    public function setBoardingKit($boardingKit)
    {
        $this->boardingKit = $boardingKit;

        return $this;
    }

    public function setVerified($verified)
    {
        $this->verified = $verified;

        return $this;
    }

    public function setKode($kode)
    {
        $this->kode = $kode;

        return $this;
    }

    public function setFinalized($finalized)
    {
        if ($finalized) {
            if ($this->getCompleted()) {
                $this->finalized = $finalized;
                $this->setRegId();

                return 1;
            } else {
                return -1;
            }
        } else {
            $this->finalized = false;
            return 0;
        }
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    public function setRegId()
    {
        $prefix = ($this->program == 'Kelas Industri') ? 'I' : 'R';
        $this->regId = $prefix.$this->getKode();
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    public function setPreviousSchool($previousSchool)
    {
        $this->previousSchool = $previousSchool;

        return $this;
    }

    public function setNisn($nisn)
    {
        $this->nisn = $nisn;

        return $this;
    }

    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    public function setProgram($program)
    {
        $this->program = $program;

        return $this;
    }

    public function setRegistrationTime(DateTime $registrationTime)
    {
        $this->registrationTime = $registrationTime;

        return $this;
    }

    public function setRegistrantData(RegistrantDataEntity $registrantData)
    {
        $this->registrantData = $registrantData;

        return $this;
    }

    public function setFather(ParentEntity $father)
    {
        $this->father = $father;

        return $this;
    }

    public function setMother(ParentEntity $mother)
    {
        $this->mother = $mother;

        return $this;
    }

    public function setGuardian(ParentEntity $guardian)
    {
        $this->guardian = $guardian;

        return $this;
    }

    public function setPaymentData(PaymentEntity $paymentData)
    {
        $this->paymentData = $paymentData;

        return $this;
    }

    public function setInitialCost($initialCost)
    {
        $this->initialCost = $initialCost;

        return $this;
    }

    public function setSubscriptionCost($subscriptionCost)
    {
        $this->subscriptionCost = $subscriptionCost;

        return $this;
    }

    public function setMainParent($mainParent)
    {
        $this->mainParent = $mainParent;

        return $this;
    }

    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * @return string
     */
    public function getUploadDir()
    {
        return $this->uploadDir;
    }

    /**
     * @param string $uploadDir
     *
     * @return self
     */
    public function setUploadDir($uploadDir)
    {
        $this->uploadDir = $uploadDir;

        return $this;
    }

    /**
     * @return bool
     */
    public function isVerified()
    {
        return $this->verified;
    }

    /**
     * @return bool
     */
    public function isFinalized()
    {
        return $this->finalized;
    }

    /**
     * @return bool
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param mixed $certificates
     *
     * @return self
     */
    public function setCertificates($certificates)
    {
        $this->certificates = $certificates;

        return $this;
    }



    /**
     * @return boolean
     */
    public function isBuyingLaptop()
    {
        return $this->BuyingLaptop;
    }

    /**
     * @param boolean $BuyingLaptop
     *
     * @return self
     */
    public function setBuyingLaptop($BuyingLaptop)
    {
        $this->BuyingLaptop = $BuyingLaptop;

        return $this;
    }
}
