<?php

/**
 * Subscribe to server events
 */

Event::subscribe('Dream\Events\ServerEventHandler');

/**
 * Subscribe to vote events
 */

Event::subscribe('Dream\Events\VoteEventHandler');

/**
 * Subscribe to view events
 */

Event::subscribe('Dream\Events\ViewEventHandler');

/**
 *
 */
Event::subscribe('Dream\Events\UserCreationHandler');