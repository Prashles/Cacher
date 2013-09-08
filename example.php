<?php
use \Prash\Cacher\Cacher as Cache;

require_once 'src/Cacher/autoload.php';

// Store 'value' as 'item' for 5 minutes
Cache::store('item', 'value', 5);

// Will return value
echo Cache::get('item');

// If cache 'item' exists and is not expired, return
// its value. If it does not exist or is expired, store
// the return value from the closure
echo Cache::make('item', 5, function()
{
	// Perform some operations
	return 'foo';
});

// Cache item permanently until manually deleted
Cache::permanent('item', 'value');

// Remove 'item' from the cache
Cache::remove('item');

// Remove all items from the cache
Cache::removeAll();