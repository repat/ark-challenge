<?php

namespace App\Services;

use ArkEcosystem\Ark\Facades\Ark;
use ArkEcosystem\Client\Connection;
use Exception;
use Illuminate\Support\Facades\Log;

class ArkService
{
    /**
     * Ark\Connection or API\[Transaction|Wallet|Delegate|...]
     *
     * @var mixed
     */
    protected $connection;

    /**
     * Constructor sets the connection based on user preference and Logs any error
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Magic method for any API call, pulling out `data` key if return is API response
     * Logging Errors if API call fails
     *
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call(string $name, array $arguments)
    {
        try {
            // Call methods on connection dynamically
            $return = [$this->connection, $name](...$arguments);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $this;
        }

        // We're at the end of the chain, this is the API response because it's an array
        if (is_array($return)) {
            // Just pick out the data
            return $return['data'] ?? [];
        }

        // This is a chained call, set the returned Api\[Transaction|Wallet] etc as connection to run other methods on
        $this->connection = $return;
        return $this;
    }

    /**
     * (Re-)setting Ark connection, possibly used from the outside but also by constructor
     */
    public function reset()
    {
        try {
            $this->connection = Ark::connection(auth()->user()->net ?? config('ark.default'));
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
