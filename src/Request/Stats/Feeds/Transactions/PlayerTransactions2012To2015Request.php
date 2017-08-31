<?php

namespace JasonRoman\NbaApi\Request\Stats\Feeds\Transactions;

use JasonRoman\NbaApi\Request\Stats\Feeds\AbstractStatsFeedsRequest;

/**
 * Retrieve all player transactions from 2012-2015.
 */
class PlayerTransactions2012To2015Request extends AbstractStatsFeedsRequest
{
    const ENDPOINT = '/feeds/NBAPlayerTransactions-559107/json.js';
}