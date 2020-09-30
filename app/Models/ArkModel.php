<?php

namespace App\Models;

use Carbon\Carbon;

class ArkModel
{
    /**
     * `data` from Arks API response
     *
     * @var array
     */
    private array $data;

    public function __construct(array $data)
    {
        $this->setDataArray($data);
    }

    /**
     * Formats date according to format defined in config
     *
     * @param string $date
     * @return string
     */
    public function formatDate(string $date) : string
    {
        return (new Carbon(array_get($this->data, $date)))->format(config('app.format_dates'));
    }

    /**
     * Formats date according to format defined above as constant
     *
     * @param string $currency
     * @return string
     */
    public function formatCurrency(string $currency) : string
    {
        return floatval(array_get($this->data, $currency)) * ARKTOSHI2ARK_MULTIPLIER . ' ' . ARK_CURRENCY;
    }

    /**
     * Getter for underlying data object
     *
     * @return array
     */
    public function getDataArray() : array
    {
        return $this->data;
    }

    /**
     * Setter for underlying data object
     *
     * @param array $data
     * @return void
     */
    public function setDataArray(array $data)
    {
        $this->data = $data;
    }

    /**
     * Magic getter passthrough for array
     *
     * @param string $name
     * @return mixed
     */
    public function __get(string $name)
    {
        return array_get($this->data, $name);
    }
}
