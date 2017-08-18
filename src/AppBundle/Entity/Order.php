<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="order")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OrderRepository")
 */
class Order
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

	/**
	 * @var date $orderDate
	 *
	 * @ORM\Column(name="orderDate", type="date", nullable=true)
	 */
	private $orderDate;

	/**
	 * @var int $user
	 *
	 * @ORM\Column(name="user", type="integer")
	 */
	private $user;

	/**
	 * @var array
	 *
	 * @ORM\Column(name="cart", type="array", nullable=true, unique=false)
	 */
	private $cart;
		

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

  public function setCart($crt)
	{
		$this->cart=$crt;
	}

	public function getCart()
	{
		return $this->cart;
	}
	public function setUser($user)
	{
		$this->user=$user;
	}

	public function getUser()
	{
		return $this->user;
	}
public function setOrderDate($orderDate)
{
    $this->orderDate = $orderDate;
}

public function getOrderDate()
{
    return $this->$orderDate;
}

}
