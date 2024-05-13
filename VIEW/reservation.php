<?php
class Reservation
{
    private ?int $id = null;
    private ?int $destination_id = null;
    private ?string $userName = null;
    private ?string $phoneNumber = null;
    private ?string $checkInDate = null;
    private ?string $checkOutDate = null;
    private ?string $accomodationType = null;
    private ?float $totalPrice = null;

    public function __construct($destinationId, $userName, $phoneNumber, $checkInDate, $checkOutDate, $accomodationType, $totalPrice, $id = null)
    {
        $this->id = $id;
        $this->destination_id = $destinationId;
        $this->userName = $userName;
        $this->phoneNumber = $phoneNumber;
        $this->checkInDate = $checkInDate;
        $this->checkOutDate = $checkOutDate;
        $this->accomodationType = $accomodationType;
        $this->totalPrice = $totalPrice;
    }


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of destination_id
     */
    public function getDestinationId()
    {
        return $this->destination_id;
    }

    /**
     * Set the value of destination_id
     *
     * @return  self
     */
    public function setDestinationId($destinationId)
    {
        $this->destination_id = $destinationId;
        return $this;
    }

    /**
     * Get the value of userName
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set the value of userName
     *
     * @return  self
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
        return $this;
    }

    /**
     * Get the value of phoneNumber
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set the value of phoneNumber
     *
     * @return  self
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * Get the value of checkInDate
     */
    public function getCheckInDate()
    {
        return $this->checkInDate;
    }

    /**
     * Set the value of checkInDate
     *
     * @return  self
     */
    public function setCheckInDate($checkInDate)
    {
        $this->checkInDate = $checkInDate;
        return $this;
    }

    /**
     * Get the value of checkOutDate
     */
    public function getCheckOutDate()
    {
        return $this->checkOutDate;
    }

    /**
     * Set the value of checkOutDate
     *
     * @return  self
     */
    public function setCheckOutDate($checkOutDate)
    {
        $this->checkOutDate = $checkOutDate;
        return $this;
    }

    /**
     * Get the value of accomodationType
     */
    public function getAccomodationType()
    {
        return $this->accomodationType;
    }

    /**
     * Set the value of accomodationType
     *
     * @return  self
     */
    public function setAccomodationType($accomodationType)
    {
        $this->accomodationType = $accomodationType;
        return $this;
    }

    /**
     * Get the value of totalPrice
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * Set the value of totalPrice
     *
     * @return  self
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
        return $this;
    }
}
